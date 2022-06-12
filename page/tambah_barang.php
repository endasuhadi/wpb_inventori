<?php

if(isset($_POST['proses'])){
    include("./conn.php");
    date_default_timezone_set("Asia/Jakarta");

    $kode_barang  = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $satuan = $_POST['satuan'];
    
    // echo $satuan;
    // query insert 
    $tgl = date('Y-m-d H:i:s', time());
    // query untuk melakukan insert data ke dalam tabel barang
    $query = "INSERT INTO tbl_barang(kode_barang, nama_barang, harga_barang, satuan, created_at, updated_at) values ('$kode_barang', '$nama_barang', '$harga_barang', '$satuan','$tgl','$tgl')";
    
    $insert = $koneksi->query($query);
    if($insert){
        ?>
            <script>
                alert('Berhasil menambahkan data');
                window.location="index.php?hal=daftar_barang";
            </script>
        <?php
    }
}


?>

<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Barang</h3>
        </div>


        <form accept="" method="post" action="">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputText">Kode Barang</label>
                    <input type="text" maxlength="10" class="form-control" name="kode_barang">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Nama Barang</label>
                    <input type="text" maxlength="50" class="form-control" name="nama_barang">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Harga Barang</label>
                    <input type="number" class="form-control" min="0" placeholder="0" name="harga_barang">
                </div>
                <div class="form-group">
                    <label for="exampleInputText" name="satuan">Satuan</label>
                    <select name="satuan" class="form-control">
                        <option value="Pcs">Pcs</option>
                        <option value="Unit">Unit</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-default">Batal</button>
                <button type="submit" name="proses" class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>