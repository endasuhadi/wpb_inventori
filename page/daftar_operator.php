<?php
$query = "SELECT * FROM tbl_operator where deleted_at is null order by id_operator Desc";

$data = $koneksi->query($query);

// print_r($data);
?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-success" onclick="window.location='http://localhost/wpb_inventori/index.php?hal=tambah_operator'">Tambah</button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Operator</th>
                        <th>Username</th>
                        <th>Email</th>
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
                                <td><?=$value['nama_operator'];?></td>
                                <td><?=$value['username'];?></td>
                                <td><?=$value['email'];?></td>
                                <td>
                                    
                                    <a href="index.php?hal=edit_operator&id=<?=$value['id_operator'];?>" class="btn btn-sm bg-gradient-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="index.php?hal=hapus_operator&id=<?=$value['id_operator'];?>" class="btn btn-sm bg-gradient-danger">
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
                        <th>Nama Operator</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>