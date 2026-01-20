<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\JenisKopiModel;
use App\Models\SupplierModel;

class Products extends BaseController
{
    protected $productModel;
    protected $jenisKopiModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->jenisKopiModel = new JenisKopiModel();
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $products = $this->productModel->select('products.*, jenis_kopi.nama_jenis, suppliers.nama_supplier')
            ->join('jenis_kopi', 'jenis_kopi.id = products.jenis_kopi_id')
            ->join('suppliers', 'suppliers.id = products.supplier_id')
            ->findAll();

        $data = [
            'title' => 'Product',
            'products' => $products
        ];
        return view('products/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Product',
            'jenis_kopi' => $this->jenisKopiModel->findAll(),
            'suppliers' => $this->supplierModel->findAll()
        ];
        return view('products/new', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'stok' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'jenis_kopi_id' => 'required',
            'supplier_id' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi');
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = null;
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/produk', $namaGambar);
        }

        $this->productModel->save([
            'jenis_kopi_id' => $this->request->getPost('jenis_kopi_id'),
            'supplier_id' => $this->request->getPost('supplier_id'),
            'stok' => $this->request->getPost('stok'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/products')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Product',
            'product' => $this->productModel->find($id),
            'jenis_kopi' => $this->jenisKopiModel->findAll(),
            'suppliers' => $this->supplierModel->findAll()
        ];
        return view('products/edit', $data);
    }

    public function update($id)
    {
         if (!$this->validate([
            'stok' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'jenis_kopi_id' => 'required',
            'supplier_id' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi');
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $this->request->getPost('gambar_lama'); // Assuming hidden field for old image

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/produk', $namaGambar);
        }

        $this->productModel->update($id, [
            'jenis_kopi_id' => $this->request->getPost('jenis_kopi_id'),
            'supplier_id' => $this->request->getPost('supplier_id'),
            'stok' => $this->request->getPost('stok'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/products')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/products')->with('success', 'Data berhasil dihapus');
    }
}
