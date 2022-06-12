<?php
// if(isset($_POST['proses'])){
    include("./conn.php");
    date_default_timezone_set("Asia/Jakarta");

    $id  = $_GET['id'];
   
    // echo $satuan;
    // query insert 
    $tgl = date('Y-m-d H:i:s', time());
    // query untuk melakukan insert data ke dalam tabel operator
    $query = "UPDATE tbl_operator set deleted_at='$tgl' where id_operator = '$id'";
    
    $hapus = $koneksi->query($query);
    if($hapus){
        ?>
            <script>
                alert('Berhasil menghapus data');
                window.location="index.php?hal=daftar_operator";
            </script>
        <?php
    }
// }
?>