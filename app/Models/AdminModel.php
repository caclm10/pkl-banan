<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'password', 'email'];

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

    public function getRules($update = false)
    {
        $rules = [
            'nama' => 'required',
        ];

        if (!$update) {
            $rules = [
                ...$rules,
                "email" => "required|is_unique[admin.email]",
                "password" => "required|min_length[4]|max_length[16]"
            ];
        }

        return $rules;
    }

    public function getErrorMessages()
    {
        return [
            'nama' => [
                'required' => 'Nama harus diisi.'
            ],
            "email" => [
                "required" => "Email harus diisi.",
                "is_unique" => "Alamat email sudah terdaftar.",
            ],
            "password" => [
                "required" => "Password harus diisi.",
                "min_length" => "Paswword minimal {param} karakter.",
                "max_length" => "Paswword maksimal {param} karakter.",
            ]
        ];
    }
}
