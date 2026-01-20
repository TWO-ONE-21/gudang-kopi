<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi - Gudang Kopi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>LAPORAN TRANSAKSI GUDANG KOPI</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Type</th>
                <th>Product</th>
                <th>Qty</th>
                <th>User</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $key => $value) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value['date'] ?></td>
                <td><?= $value['type'] == 'in' ? 'Masuk' : 'Keluar' ?></td>
                <td><?= $value['product_name'] ?></td>
                <td><?= $value['quantity'] ?></td>
                <td><?= $value['username'] ?></td>
                <td><?= $value['notes'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>
