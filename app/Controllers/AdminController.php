<?php

namespace App\Controllers;

use CodeIgniter\Model;
use Config\Services;

class AdminController extends BaseController
{
    protected $helpers = ['admin', 'file', 'form'];

    protected Model $model;
    protected $instance;
    protected $routePrefix;
    protected $data;

    protected $modelData;

    protected function redirectIfEmpty($id, $ajax = false)
    {
        $this->modelData = $this->model->find($id);
        if (!$this->modelData) {
            if ($ajax) {
                $this->response->setStatusCode(404);
            } else {
                $this->redirectToIndex()->send();
            }
            exit;
        }
    }

    protected function checkValidation($rules, $messages = [], $isAjax = false)
    {
        if (!$this->validate($rules, $messages)) {
            if ($isAjax) {
                $errors = $this->validator->getErrors();

                // Mengembalikan respons JSON dengan status 'error' dan pesan kesalahan
                $this->response->setStatusCode(422)->setJSON([
                    'status' => 'error',
                    'message' => 'Validasi gagal.',
                    'errors' => $errors
                ])->send();
            } else {
                redirect()
                    ->back()
                    ->withInput()
                    ->send();
            }
            exit;
        }
    }

    protected function redirectToIndex()
    {
        return redirect()->to("/admin/" . ($this->routePrefix ? $this->routePrefix . '/' : '') . $this->instance);
    }

    protected function view($crudType, $data = [])
    {
        return view($this->getViewPrefixPath() . $crudType, $data);
    }

    protected function populateData($isAjax = false)
    {
        $this->data = $isAjax ? $this->request->getJSON(true) : $this->request->getPost();
    }

    protected function pushData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function unsetData($key)
    {
        unset($this->data[$key]);
    }

    protected function notif($event)
    {
        setNotif(str_replace('-', ' ', $this->instance), $event);
    }

    protected function addHelpers($helpers)
    {
        $this->helpers = [...$this->helpers, ...$helpers];
    }

    protected function storeImage($image, $columnName, $folder)
    {
        if ($image->isValid()) {
            $path = moveFileToPublic($image, $folder);
            $this->pushData($columnName, $path);

            return $path;
        }

        return "";
    }

    protected function updateImage($image, $columnName, $folder, $oldPath)
    {
        if ($image->isValid()) {
            $path = moveFileToPublic($image, $folder);

            if ($oldPath) {
                deletePublicFile($oldPath);
            }

            $this->pushData($columnName, $path);
        }
    }

    protected function insertModel($additionalData = [], $notif = true)
    {
        $this->model->insert([...$this->data, ...$additionalData]);

        if ($notif) {
            $this->notif('saved');
        }
    }

    protected function updateModel($id, $additionalData = [])
    {
        $this->model->update($id, [...$this->data, ...$additionalData]);

        $this->notif('saved');
    }

    protected function deleteModel($id, $imageColumn = null, $notif = true)
    {
        $data = $this->modelData;

        if ($data) {
            if ($imageColumn && $data[$imageColumn]) {
                deletePublicFile($data[$imageColumn]);
            }

            $this->model->delete($id);

            if ($notif) {
                $this->notif('deleted');
            }
        }
    }

    private function getViewPrefixPath()
    {
        return "admin/" . ($this->routePrefix ? $this->routePrefix . '/' : '') . $this->instance . '/';
    }
}
