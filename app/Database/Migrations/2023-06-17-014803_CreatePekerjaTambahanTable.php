<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePekerjaTambahanTable extends Migration
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
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'pekerja tambahan'
            ],
            'path_gambar' => [
                'type' => "VARCHAR",
                'constraint' => 100,
                'null' => true
            ],
        ]);


        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('pekerja_tambahan');
    }

    public function down()
    {
        $this->forge->dropTable('pekerja_tambahan');
    }
}
