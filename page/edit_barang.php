<?php
$kode_barang  = 0;
$nama_barang = 0;
$harga_barang = 0;
$satuan = 0;
include("./conn.php");
date_default_timezone_set("Asia/Jakarta");

if(isset($_GET['id'])){

    $id_barang = $_GET['id'];
    $tgl = date('Y-m-d H:i:s', time());
    // query untuk melakukan insert data ke dalam tabel barang
    $query = "SELECT * FROM tbl_barang where id_barang='$id_barang'";
    
    $data = $koneksi->query($query);
    
    while($value = $data->fetch_array()){
        $kode_barang  = $value['kode_barang'];
        $nama_barang = $value['nama_barang'];
        $harga_barang = $value['harga_barang'];
        $satuan = $value['satuan'];
    }
}
if(isset($_POST['ubah'])){
    $kode_barang  = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $satuan = $_POST['satuan'];
    
    // echo $satuan;
    // query insert 
    $tgl = date('Y-m-d H:i:s', time());
    $id = $_GET['id'];
    // query untuk melakukan insert data ke dalam tabel barang
    // $query = "INSERT INTO tbl_barang(kode_barang, nama_barang, harga_barang, satuan, created_at, updated_at) values ('$kode_barang', '$nama_barang', '$harga_barang', '$satuan','$tgl','$tgl')";
    $query = "UPDATE tbl_barang set nama_barang = '$nama_barang', harga_barang ='$harga_barang', satuan='$satuan' where id_barang ='$id'";

    $update = $koneksi->query($query);

    if($update){
        ?>
            <script>
                alert('Berhasil mengubah data');
                window.location="index.php?hal=daftar_barang";
            </script>
        <?php
    }

}



?>

<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Barang</h3>
        </div>


        <form accept="" method="post" action="">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputText">Kode Barang</label>
                    <input type="text" maxlength="10" value="<?=$kode_barang;?>" class="form-control" name="kode_barang" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Nama Barang</label>
                    <input type="text" maxlength="50" class="form-control" value="<?=$nama_barang;?>" name="nama_barang">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Harga Barang</label>
                    <input type="number" class="form-control" min="0" value="<?=$harga_barang;?>" placeholder="0" name="harga_barang">
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
                <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah</button>
            </div>
        </form>
    </div>
</div>