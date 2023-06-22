<?php

namespace App\Models;

use CodeIgniter\Model;
use Intervention\Image\ImageManagerStatic as Image;

class TimModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tim';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'jabatan', 'deskripsi', 'path_gambar'];

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

    public function getRules($image, $oldPath = null)
    {
        return [
            'nama' => 'required|max_length[100]',
            'jabatan' => 'required|max_length[50]',
            'deskripsi' => 'required|max_length[250]',
            'gambar' => [
                static function ($value, $data, &$error, $field) use ($oldPath, $image) {
                    if ($value === null || $value === '') {
                        return true; // Skip the validation if no image is provided
                    }

                    if ($oldPath && $image->getError() != 0 && $image->getError() != 4) {
                        $error = "File tidak valid.";
                        return false;
                    }

                    if (!$oldPath && !$image->isValid()) {
                        $error = "File tidak ada/tidak valid.";
                        return false;
                    }

                    // Periksa ukuran resolusi gambar
                    $uploadedImage = Image::make($image->getTempName());
                    $width = $uploadedImage->getWidth();
                    $height = $uploadedImage->getHeight();

                    if ($width > 164 || $height > 164) {
                        $error = "Ukuran gambar maksimal adalah 164x164 piksel.";
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
            'nama' => [
                'required' => 'Nama harus diisi.',
                'max_length' => 'Nama maksimal {param} karakter.'
            ],
            'jabatan' => [
                'required' => 'Jabatan harus diisi.',
                'max_length' => 'Jabatan maksimal {param} karakter.'
            ],
            'deskripsi' => [
                'required' => 'Deskripsi harus diisi.',
                'max_length' => 'Deskripsi maksimal {param} karakter.'
            ],
            'gambar' => [
                'is_image' => 'Format gambar tidak valid.'
            ]
        ];
    }

    public function isPekerjaProyek($id)
    {
        $builder = $this->db->table('tim');

        $builder->select('id')
            ->where('id', $id)
            ->where("EXISTS (SELECT id FROM pekerja_proyek WHERE id_tim = $id)");

        $query = $builder->get();

        return $query->getNumRows() > 0;
    }
}
