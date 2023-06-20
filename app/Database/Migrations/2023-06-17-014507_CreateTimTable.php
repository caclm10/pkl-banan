<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTimTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'path_gambar' => [
                'type' => "VARCHAR",
                'constraint' => 100
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tim');
    }

    public function down()
    {
        $this->forge->dropTable('tim');
    }
}
