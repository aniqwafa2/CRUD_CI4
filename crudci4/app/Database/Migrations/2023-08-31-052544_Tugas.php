<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tugas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tugas_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tugas_judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tugas_status' => [
                'type' => 'INT',
                'constraint' => 2,
            ],
        ]);
        $this->forge->addKey('tugas_id', true);
        $this->forge->createTable('tugas');
    }

    public function down()
    {
        $this->forge->dropTable('tugas');
    }
}
