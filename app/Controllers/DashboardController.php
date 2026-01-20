<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $transactionModel = new TransactionModel();

        $data = [
            'title' => 'Dashboard',
            'total_produk' => $productModel->countAllResults(),
            'total_transaksi' => $transactionModel->countAllResults(),
            'stok_menipis' => $productModel->where('stok <', 10)->countAllResults(),
        ];

        return view('dashboard', $data);
    }
}
