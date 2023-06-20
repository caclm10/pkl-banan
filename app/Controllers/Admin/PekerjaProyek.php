<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class PekerjaProyek extends AdminController
{
    protected $instance = 'pekerja-proyek';

    protected $proyekModel;
    protected $timModel;
    protected $pekerjaTambahanModel;

    public function __construct()
    {
        $this->model = new \App\Models\PekerjaProyekModel();

        $this->proyekModel = new \App\Models\ProyekModel();
        $this->timModel = new \App\Models\TimModel();
        $this->pekerjaTambahanModel = new \App\Models\PekerjaTambahanModel();
    }

    public function index($projectId)
    {
        $teamWorkers = $this->model
            ->select('pekerja_proyek.*, tim.nama, tim.path_gambar, tim.jabatan')
            ->join('tim', 'pekerja_proyek.id_tim = tim.id', 'left')
            ->where('pekerja_proyek.id_proyek', $projectId)
            ->where('pekerja_proyek.id_tim IS NOT NULL', NULL, false)
            ->find();

        $additionalWorkers = $this->model
            ->select('pekerja_proyek.*, pekerja_tambahan.nama, pekerja_tambahan.path_gambar, pekerja_tambahan.jabatan')
            ->join('pekerja_tambahan', 'pekerja_proyek.id_pekerja_tambahan = pekerja_tambahan.id', 'left')
            ->where('pekerja_proyek.id_proyek', $projectId)
            ->where('pekerja_proyek.id_pekerja_tambahan IS NOT NULL', NULL, false)
            ->find();

        // Mendapatkan ID pekerja tim
        $teamWorkerIds = array_column($teamWorkers, 'id_tim');
        $remainingTeams = [];
        if (count($teamWorkerIds) > 0) {
            $remainingTeams = $this->timModel->whereNotIn('id', $teamWorkerIds)->find();
        } else {
            $remainingTeams = $this->timModel->findAll();
        }

        // Mendapatkan ID pekerja tambahan
        $additionalWorkerIds = array_column($additionalWorkers, 'id_pekerja_tambahan');
        $remainingAdditionalWorkers = [];
        if (count($additionalWorkerIds) > 0) {
            $remainingAdditionalWorkers = $this->pekerjaTambahanModel->whereNotIn('id', $additionalWorkerIds)->find();
        } else {
            $remainingAdditionalWorkers = $this->pekerjaTambahanModel->findAll();
        }

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'remainingTeams' => $remainingTeams,
                'remainingAdditionalWorkers' => $remainingAdditionalWorkers
            ]);
        }


        return $this->view('index', [
            'project' => $this->proyekModel->find($projectId),
            'teamWorkers' => $teamWorkers,
            'additionalWorkers' => $additionalWorkers,
        ]);
    }

    public function store($projectId)
    {
        $this->checkValidation($this->model->getRules(), $this->model->getErrorMessages(), true);

        $this->populateData(true);

        $this->pushData("id_proyek", $projectId);

        $pekerja = NULL;

        if ($this->data['tipe'] == 'tim') {
            $this->pushData('id_tim', $this->data['pekerja']);
            $pekerja = $this->timModel->find($this->data['pekerja']);
        } else {
            $this->pushData('id_pekerja_tambahan', $this->data['pekerja']);
            $pekerja = $this->pekerjaTambahanModel->find($this->data['pekerja']);
        }

        $this->insertModel([], false);

        return $this->response->setJSON([...$pekerja, 'id_pekerja_proyek' => $this->model->getInsertID()]);
    }

    public function destroy($projectId, $workerId)
    {
        $this->redirectIfEmpty($workerId);

        $this->deleteModel($workerId, null, false);

        return $this->response->setJSON([]);
    }
}
