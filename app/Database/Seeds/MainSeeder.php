<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'username' => 'admin',
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'name'     => 'Administrator',
            'role'     => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $this->db->table('jenis_kopi')->insertBatch([
            ['nama_jenis' => 'Kopi Rangkiang Minang', 'deskripsi' => 'Kopi minang berkualitas tinggi'],
            ['nama_jenis' => 'Robusta Lampung', 'deskripsi' => 'Kopi hitampahit'],
            ['nama_jenis' => 'Kopi Gayi', 'deskripsi' => 'Kopi khas aceh'],
        ]);

        $this->db->table('suppliers')->insertBatch([
            ['nama_supplier' => 'CV. Kopi Nusantara', 'telp' => '08888888888', 'alamat' => 'Bukittinggi'],
            ['nama_supplier' => 'UD. Petani Makmur', 'telp' => '08999999999', 'alamat' => 'Lampung'],
        ]);
    }
}