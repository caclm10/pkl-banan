<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProyekTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => "VARCHAR",
                'constraint' => 50,
            ],
            'deskripsi' => [
                'type' => "TEXT",
            ],
            'tanggal_mulai' => [
                'type' => 'DATETIME',
            ],
            'tanggal_selesai' => [
                'type' => 'DATETIME',
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('proyek');
    }

    public function down()
    {
        $this->forge->dropTable('proyek');
    }
}
