<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\ProductModel;

class Transaksi extends BaseController
{
    protected $transactionModel;
    protected $productModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $transactions = $this->transactionModel->select('transactions.*, products.id as product_id, users.username')
            ->join('products', 'products.id = transactions.product_id')
            ->join('users', 'users.id = transactions.user_id')
            ->orderBy('transactions.created_at', 'DESC')
            ->findAll();

        // Separate query to get product names because of potential column name conflicts
        foreach ($transactions as &$t) {
             $product = $this->productModel->find($t['product_id']);
             $t['product_name'] = $product ? $product['jenis_kopi_id'] : 'Unknown'; // Placeholder logic, ideally join with jenis_kopi too or get generic name
             // Better approach: Join properly. Let's refined the join.
        }
        
        // Refined Join to get meaningful product name (e.g. from joining products -> jenis_kopi)
        $transactions = $this->transactionModel->select('transactions.*, jenis_kopi.nama_jenis as product_name, users.username')
            ->join('products', 'products.id = transactions.product_id')
            ->join('jenis_kopi', 'jenis_kopi.id = products.jenis_kopi_id')
            ->join('users', 'users.id = transactions.user_id')
            ->orderBy('transactions.date', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Transaksi',
            'transactions' => $transactions
        ];
        return view('transaksi/index', $data);
    }

    public function masuk()
    {
        $data = [
            'title' => 'Barang Masuk',
            'type' => 'in',
            'products' => $this->productModel->select('products.*, jenis_kopi.nama_jenis')
                ->join('jenis_kopi', 'jenis_kopi.id = products.jenis_kopi_id')
                ->findAll()
        ];
        return view('transaksi/form', $data);
    }

    public function keluar()
    {
        $data = [
            'title' => 'Barang Keluar',
            'type' => 'out',
            'products' => $this->productModel->select('products.*, jenis_kopi.nama_jenis')
                ->join('jenis_kopi', 'jenis_kopi.id = products.jenis_kopi_id')
                ->findAll()
        ];
        return view('transaksi/form', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric',
            'date' => 'required',
            'type' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi');
        }

        $productId = $this->request->getPost('product_id');
        $quantity = (int)$this->request->getPost('quantity');
        $type = $this->request->getPost('type');
        $date = $this->request->getPost('date');
        $notes = $this->request->getPost('notes');
        $userId = session()->get('id');

        $product = $this->productModel->find($productId);
        if (!$product) {
            return redirect()->back()->withInput()->with('error', 'Produk tidak ditemukan');
        }

        $currentStock = $product['stok'];
        $newStock = 0;

        if ($type == 'in') {
            $newStock = $currentStock + $quantity;
        } else {
            if ($currentStock < $quantity) {
                 return redirect()->back()->withInput()->with('error', 'Stok tidak cukup!');
            }
            $newStock = $currentStock - $quantity;
        }

        // Update Product Stock
        $this->productModel->update($productId, ['stok' => $newStock]);

        // Create Transaction
        $this->transactionModel->save([
            'product_id' => $productId,
            'user_id' => $userId,
            'type' => $type,
            'quantity' => $quantity,
            'date' => $date,
            'notes' => $notes
        ]);

        return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil disimpan');
    }
}
