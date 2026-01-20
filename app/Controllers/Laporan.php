<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\ProductModel;

class Laporan extends BaseController
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
            ->orderBy('transactions.date', 'DESC')
            ->findAll();

        foreach ($transactions as &$t) {
             $product = $this->productModel->find($t['product_id']);
             // We need to fetch the Join Kopi Name
             // Since productModel find returns array, we need to join manually or query
             // Ideally we should have joined in the main query but following Transaksi Controller logic
             // Let's improve the main query directly instead of loop query like in Transaksi Controller
        }
        
        // Improved query to get Product Name directly
        $transactions = $this->transactionModel->select('transactions.*, jenis_kopi.nama_jenis as product_name, users.username')
            ->join('products', 'products.id = transactions.product_id')
            ->join('jenis_kopi', 'jenis_kopi.id = products.jenis_kopi_id')
            ->join('users', 'users.id = transactions.user_id')
            ->orderBy('transactions.date', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Laporan Transaksi',
            'transactions' => $transactions
        ];
        return view('laporan/index', $data);
    }

    public function cetak()
    {
         $transactions = $this->transactionModel->select('transactions.*, jenis_kopi.nama_jenis as product_name, users.username')
            ->join('products', 'products.id = transactions.product_id')
            ->join('jenis_kopi', 'jenis_kopi.id = products.jenis_kopi_id')
            ->join('users', 'users.id = transactions.user_id')
            ->orderBy('transactions.date', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Cetak Laporan',
            'transactions' => $transactions
        ];
        return view('laporan/cetak', $data);
    }
}
