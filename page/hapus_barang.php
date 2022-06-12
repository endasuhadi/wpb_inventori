<?php
// if(isset($_POST['proses'])){
    include("./conn.php");
    date_default_timezone_set("Asia/Jakarta");

    $id  = $_GET['id'];
   
    // echo $satuan;
    // query insert 
    $tgl = date('Y-m-d H:i:s', time());
    // query untuk melakukan insert data ke dalam tabel barang
    $query = "UPDATE tbl_barang set deleted_at='$tgl' where id_barang = '$id'";
    
    $hapus = $koneksi->query($query);
    if($hapus){
        ?>
            <script>
                alert('Berhasil menghapus data');
                window.location="index.php?hal=daftar_barang";
            </script>
        <?php
    }
// }
?>