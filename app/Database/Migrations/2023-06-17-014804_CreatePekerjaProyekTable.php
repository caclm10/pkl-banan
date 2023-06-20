<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePekerjaProyekTable extends Migration
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
            'id_tim' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true
            ],
            'id_pekerja_tambahan' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_proyek', 'proyek', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_tim', 'tim', 'id');
        $this->forge->addForeignKey('id_pekerja_tambahan', 'pekerja_tambahan', 'id');

        $this->forge->createTable('pekerja_proyek');
    }

    public function down()
    {
        $this->forge->dropTable('pekerja_proyek');
    }
}
