<?php
// if(isset($_POST['proses'])){
    include("./conn.php");
    date_default_timezone_set("Asia/Jakarta");

    $id  = $_GET['id'];
   
    // echo $satuan;
    // query insert 
    $tgl = date('Y-m-d H:i:s', time());
    // query untuk melakukan insert data ke dalam tabel barang
    $query = "UPDATE tbl_barang_keluar set deleted_at='$tgl' where id_barang_keluar = '$id'";
    
    $hapus = $koneksi->query($query)or die($koneksi->error);
    if($hapus){
        ?>
            <script>
                alert('Berhasil menghapus data');
                window.location="index.php?hal=daftar_barang_keluar";
            </script>
        <?php
    }
// }
?>