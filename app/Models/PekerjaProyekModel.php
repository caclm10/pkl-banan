<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaProyekModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pekerja_proyek';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_proyek', 'id_tim', 'id_pekerja_tambahan'];

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
            'pekerja' => 'required|integer'
        ];
    }

    public function getErrorMessages()
    {
        return [
            'pekerja' => [
                'required' => 'Pekerja harus diisi.',
                'integer' => 'Format data tidak valid.',
            ],
        ];
    }
}
