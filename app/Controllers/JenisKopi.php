<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisKopiModel;

class JenisKopi extends BaseController
{
    protected $jenisKopiModel;

    public function __construct()
    {
        $this->jenisKopiModel = new JenisKopiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jenis Kopi',
            'jeniskopi' => $this->jenisKopiModel->findAll()
        ];
        return view('jeniskopi/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Jenis Kopi'
        ];
        return view('jeniskopi/new', $data);
    }

    public function create()
    {
        if (!$this->validate(['nama_jenis' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Nama jenis wajib diisi');
        }

        $this->jenisKopiModel->save([
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/jenis-kopi')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Jenis Kopi',
            'jeniskopi' => $this->jenisKopiModel->find($id)
        ];
        return view('jeniskopi/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate(['nama_jenis' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Nama jenis wajib diisi');
        }

        $this->jenisKopiModel->update($id, [
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/jenis-kopi')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $this->jenisKopiModel->delete($id);
        return redirect()->to('/jenis-kopi')->with('success', 'Data berhasil dihapus');
    }
}
