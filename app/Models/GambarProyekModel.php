<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarProyekModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'gambar_proyek';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["id_proyek", "path_gambar", "urutan"];

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
    protected $beforeInsert   = ['setUrutan'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getRules($image, $oldPath = null)
    {
        return [
            'gambar' => [
                static function ($value, $data, &$error, $field) use ($oldPath, $image) {
                    if ($oldPath && $image->getError() != 0 && $image->getError() != 4) {
                        $error = "File tidak valid.";
                        return false;
                    }

                    if (!$oldPath && !$image->isValid()) {
                        $error = "File tidak ada/tidak valid.";
                        return false;
                    }

                    return true;
                },
                'is_image[gambar]'
            ],
        ];
    }

    public function getErrorMessages()
    {
        return [
            'gambar' => [
                'is_image' => 'Format gambar tidak valid.'
            ],
        ];
    }

    protected function setUrutan(array $data)
    {
        // Mengambil urutan terakhir dari database
        $lastUrutan = $this->select('urutan')->orderBy('urutan', 'DESC')->first();

        // Menentukan nilai urutan berikutnya
        $urutan = $lastUrutan ? $lastUrutan['urutan'] + 1 : 1;

        $data['data']['urutan'] = $urutan;

        return $data;
    }

    public function updateUrutan($images = [])
    {
        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            // Loop melalui array imageIds dan update urutan gambar
            foreach ($images as $image) {
                $db->table('gambar_proyek')->where('id', $image['id'])->update(['urutan' => $image['urutan']]);
            }

            $db->transCommit();
            return true; // Berhasil melakukan transaksi
        } catch (\Exception $e) {
            $db->transRollback();
            return false; // Terjadi kesalahan saat transaksi
        }
    }
}
