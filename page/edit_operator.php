<?php
$nama_operator  = 0;
$email = 0;
$username = 0;
include("./conn.php");
date_default_timezone_set("Asia/Jakarta");

if(isset($_GET['id'])){

    $id_operator = $_GET['id'];
    $tgl = date('Y-m-d H:i:s', time());
    // query untuk melakukan insert data ke dalam tabel operator
    $query = "SELECT * FROM tbl_operator where id_operator='$id_operator'";
    
    $data = $koneksi->query($query);
    
    while($value = $data->fetch_array()){
        $nama_operator  = $value['nama_operator'];
        $email = $value['email'];
        $username = $value['username'];
    }
}
if(isset($_POST['ubah'])){
    $nama_operator  = $_POST['nama_operator'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    // echo $password;
    // query insert 
    $tgl = date('Y-m-d H:i:s', time());
    $id = $_GET['id'];
    // query untuk melakukan insert data ke dalam tabel operator
    // $query = "INSERT INTO tbl_operator(nama_operator, email, username, password, created_at, updated_at) values ('$nama_operator', '$email', '$username', '$password','$tgl','$tgl')";
    $query = "UPDATE tbl_operator set nama_operator = '$nama_operator', email = '$email', username ='$username', password='$password' where id_operator ='$id'";

    $update = $koneksi->query($query)or die($koneksi->error);

    if($update){
        ?>
            <script>
                alert('Berhasil mengubah data');
                window.location="index.php?hal=daftar_operator";
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
                    <label for="exampleInputText">Nama Operator</label>
                    <input value="<?=$nama_operator;?>" type="text" maxlength="10" class="form-control" name="nama_operator" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Email</label>
                    <input value="<?=$email;?>" type="email" maxlength="250" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Username</label>
                    <input value="<?=$username;?>" type="text" maxlength="250" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Password</label>
                    <input type="password" maxlength="250" class="form-control" name="password" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-default">Batal</button>
                <button type="submit" name="ubah" class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>