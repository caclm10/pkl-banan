<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyekModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'proyek';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getRules()
    {
        return [
            'nama' => 'required|max_length[50]',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|valid_date[Y-m-d]',
            'tanggal_selesai' => 'required|valid_date[Y-m-d]'
        ];
    }

    public function getErrorMessages()
    {
        return [
            'nama' => [
                'required' => 'Nama harus diisi.',
                'max_length' => 'Nama maksimal {param} karakter.'
            ],
            'deskripsi' => [
                'required' => 'Deskripsi harus diisi.',
            ],
            'tanggal_mulai' => [
                'required' => 'Tanggal mulai harus diisi.',
                'valid_date' => 'Format tanggal mulai tidak valid.'
            ],
            'tanggal_selesai' => [
                'required' => 'Tanggal selesai harus diisi.',
                'valid_date' => 'Format tanggal selesai tidak valid.'
            ]
        ];
    }

    public function getProyekWithFirstGambar($limit = null)
    {
        $query = $this->select('proyek.*, gambar_proyek.path_gambar')
            ->join('gambar_proyek', 'gambar_proyek.id_proyek = proyek.id', 'left')
            ->groupBy('proyek.id')
            ->whereIn('gambar_proyek.urutan', function ($subquery) {
                $subquery->selectMin('urutan')->from('gambar_proyek')->where('gambar_proyek.id_proyek = proyek.id');
            })
            ->orWhere('gambar_proyek.id_proyek IS NULL');

        if ($limit) {
            $query = $query->limit($limit);
        }

        return $query->get()->getResultArray();
    }

    public function getProyekWithGambarAndPekerja($id)
    {
        $query = $this->select('proyek.*,
        (
            SELECT GROUP_CONCAT(DISTINCT CONCAT(gambar_proyek.path_gambar) ORDER BY gambar_proyek.urutan ASC SEPARATOR ", ")
            FROM gambar_proyek
            WHERE gambar_proyek.id_proyek = proyek.id
        ) AS path_gambar,
        (
            SELECT GROUP_CONCAT(DISTINCT CONCAT(tim.nama, "::", tim.jabatan, "::", tim.path_gambar) SEPARATOR ", ")
            FROM tim
            JOIN pekerja_proyek ON pekerja_proyek.id_tim = tim.id
            WHERE pekerja_proyek.id_proyek = proyek.id
        ) AS tim_info,
        (
            SELECT GROUP_CONCAT(DISTINCT CONCAT(pekerja_tambahan.nama, "::", pekerja_tambahan.jabatan, "::", pekerja_tambahan.path_gambar) SEPARATOR ", ")
            FROM pekerja_tambahan
            JOIN pekerja_proyek ON pekerja_proyek.id_pekerja_tambahan = pekerja_tambahan.id
            WHERE pekerja_proyek.id_proyek = proyek.id
        ) AS pekerja_tambahan_info')
            ->join('pekerja_proyek', 'pekerja_proyek.id_proyek = proyek.id', 'left')
            ->where('proyek.id', $id)
            ->groupBy('proyek.id')
            ->get();

        $result = $query->getRowArray();


        if ($result) {
            $gambarProyekArray = explode(", ", $result['path_gambar']);
            $timInfoArray = explode(", ", $result['tim_info']);
            $pekerjaTambahanInfoArray = explode(", ", $result['pekerja_tambahan_info']);

            $gambarArray = [];
            $timArray = [];
            $pekerjaTambahanArray = [];

            if (count($gambarProyekArray) > 0 && $gambarProyekArray[0] != '') {
                foreach ($gambarProyekArray as $gambarProyek) {
                    $gambarArray[] = [
                        'path_gambar' => $gambarProyek
                    ];
                }
            }

            if (count($timInfoArray) > 0 && $timInfoArray[0] != '') {
                foreach ($timInfoArray as $timInfo) {
                    $timData = explode("::", $timInfo);
                    $timArray[] = [
                        'nama' => $timData[0],
                        'jabatan' => $timData[1],
                        'path_gambar' => $timData[2]
                    ];
                }
            }

            if (count($pekerjaTambahanInfoArray) > 0 && $pekerjaTambahanInfoArray[0] != '') {
                foreach ($pekerjaTambahanInfoArray as $pekerjaTambahanInfo) {
                    $pekerjaTambahanData = explode("::", $pekerjaTambahanInfo);
                    $pekerjaTambahanArray[] = [
                        'nama' => $pekerjaTambahanData[0],
                        'jabatan' => $pekerjaTambahanData[1],
                        'path_gambar' => $pekerjaTambahanData[2]
                    ];
                }
            }

            $pekerjaArray = array_merge($timArray, $pekerjaTambahanArray);
            $result['gambar'] = $gambarArray;
            $result['pekerja'] = $pekerjaArray;
            unset($result['path_gambar']);
            unset($result['tim_info']);
            unset($result['pekerja_tambahan_info']);
        }

        return $result;
    }
}
