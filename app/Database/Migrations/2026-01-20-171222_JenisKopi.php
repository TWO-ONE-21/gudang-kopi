<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisKopi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_jenis' => ['type' => 'VARCHAR', 'constraint' => 100],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis_kopi');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_kopi');
    }
}