<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGambarProyekTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_proyek' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'path_gambar' => [
                'type' => "VARCHAR",
                'constraint' => 100,
            ],
            'urutan' => [
                'type' => "INT",
                'unsigned' => true
            ]
        ]);


        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('gambar_proyek');
    }

    public function down()
    {
        $this->forge->dropTable('gambar_proyek');
    }
}
