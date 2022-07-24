<?php
$query = "SELECT
	* 
FROM
	tbl_penjualan p
	LEFT JOIN tbl_barang b ON p.fid_barang = b.id_barang
	LEFT JOIN tbl_operator o ON p.fid_operator = o.id_operator 
WHERE
	b.deleted_at IS NULL 
ORDER BY
	id_barang DESC";

$data = $koneksi->query($query) or die($koneksi->error);

// print_r($data);
?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-success" onclick="window.location='./?hal=penjualan_barang_form'">Tambah</button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Terjual</th>
                        <th>Operator</th>
                        <th>Create Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $rows = $data->fetch_all(MYSQLI_ASSOC);
                    foreach ($rows as $value) {
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $value['kode_barang']; ?></td>
                            <td><?= $value['nama_barang']; ?></td>
                            <td><?= $value['qty']; ?></td>
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
                        <th>#</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Terjual</th>
                        <th>Operator</th>
                        <th>Create Date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>