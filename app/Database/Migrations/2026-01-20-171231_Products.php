<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'jenis_kopi_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'supplier_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'stok' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'harga_beli' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'harga_jual' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'gambar' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('jenis_kopi_id', 'jenis_kopi', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('supplier_id', 'suppliers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}