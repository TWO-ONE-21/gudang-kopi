<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Supplier',
            'suppliers' => $this->supplierModel->findAll()
        ];
        return view('supplier/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Supplier'
        ];
        return view('supplier/new', $data);
    }

    public function create()
    {
        if (!$this->validate(['nama_supplier' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Nama supplier wajib diisi');
        }

        $this->supplierModel->save([
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'telp' => $this->request->getPost('telp'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        return redirect()->to('/suppliers')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Supplier',
            'supplier' => $this->supplierModel->find($id)
        ];
        return view('supplier/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate(['nama_supplier' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Nama supplier wajib diisi');
        }

        $this->supplierModel->update($id, [
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'telp' => $this->request->getPost('telp'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        return redirect()->to('/suppliers')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $this->supplierModel->delete($id);
        return redirect()->to('/suppliers')->with('success', 'Data berhasil dihapus');
    }
}
