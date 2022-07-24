<?php

include 'conn.php';

$f = $_GET['f'];
$t = $_GET['t'];

$dcf = date_create($f);
$dct = date_create($t);

$dff = date_format($dcf, "d M Y");
$dft = date_format($dct, "d M Y");

$query = "SELECT
	* 
FROM
	tbl_penjualan p
	LEFT JOIN tbl_barang b ON p.fid_barang = b.id_barang
	LEFT JOIN tbl_operator o ON p.fid_operator = o.id_operator 
WHERE
	b.deleted_at IS NULL 
    and DATE(p.create_date) between '$f' and '$t'
ORDER BY
	id_barang DESC";

$data = $koneksi->query($query) or die($koneksi->error);

$total_terjual = [];
$total_harga = [];
$total_jumlah = [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            align-items: center;
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <h1>LAPORAN PENJUALAN</h1>
        Laporan Tanggal: <?= $dff; ?> Sampai <?= $dft; ?>
    </div>

    <p></p>
    <div style="text-align: center;">
        <table id="example1" class="table table-bordered table-striped" border="1" cellpadding="5" cellspacing="5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Terjual</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Operator</th>
                    <th>Create Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $rows = $data->fetch_all(MYSQLI_ASSOC);
                foreach ($rows as $value) {
                    $total_terjual[] = $value['qty'];
                    $total_harga[] = $value['harga_barang'];
                    $total_jumlah[] = $value['harga_barang'] * $value['qty'];
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $value['kode_barang']; ?></td>
                        <td><?= $value['nama_barang']; ?></td>
                        <td><?= $value['qty']; ?></td>
                        <td>Rp <?= number_format($value['harga_barang'], 0, ",", "."); ?></td>
                        <td>Rp <?= number_format($value['harga_barang'] * $value['qty'], 0, ",", "."); ?></td>
                        <td><?= $value['nama_operator']; ?></td>
                        <td><?= $value['create_date']; ?></td>
                    </tr>
                <?php
                    $no++;
                }

                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">TOTAL</th>
                    <th><?= number_format(array_sum($total_terjual), 0, ",", "."); ?></th>
                    <th>Rp <?= number_format(array_sum($total_harga), 0, ",", "."); ?></th>
                    <th>Rp <?= number_format(array_sum($total_jumlah), 0, ",", "."); ?></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <p></p>


</body>

</html>