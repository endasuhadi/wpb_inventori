<?php
$query = "SELECT * FROM tbl_barang b LEFT JOIN tbl_operator o ON b.id_operator=o.id_operator where b.deleted_at is null order by id_barang Desc";

$data = $koneksi->query($query)or die($koneksi->error);

// print_r($data);
?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-success" onclick="window.location='http://localhost/wpb_inventori/index.php?hal=tambah_barang'">Tambah</button>
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
                        <th>Harga Barang</th>
                        <th>Satuan</th>
                        <th>Operator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        while($value = $data->fetch_array()){
                            ?>
                            <tr>
                                <td><?=$no;?></td>
                                <td><?=$value['kode_barang'];?></td>
                                <td><?=$value['nama_barang'];?></td>
                                <td><?=$value['harga_barang'];?></td>
                                <td><?=$value['satuan'];?></td>
                                <td><?=(isset($value->nama_operator)?$value->nama_operator:'ADMIN');?></td>
                                <td>
                                    
                                    <a href="index.php?hal=edit_barang&id=<?=$value['id_barang'];?>" class="btn btn-sm bg-gradient-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="index.php?hal=hapus_barang&id=<?=$value['id_barang'];?>" class="btn btn-sm bg-gradient-danger">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
                                </td>
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
                        <th>Harga Barang</th>
                        <th>Satuan</th>
                        <th>Operator</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>