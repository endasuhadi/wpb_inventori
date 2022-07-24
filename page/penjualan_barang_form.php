<?php
include("./conn.php");
if (isset($_POST['proses'])) {
    date_default_timezone_set("Asia/Jakarta");
    $id_barang  = $_POST['id_barang'];
    $qty = $_POST['qty'];
    $id_operator = $_SESSION['login']['id_operator'];

    // echo $satuan;
    // query insert 
    $tgl = date('Y-m-d H:i:s', time());
    // query untuk melakukan insert data ke dalam tabel barang
    $query = "INSERT INTO tbl_penjualan(fid_operator,fid_barang, qty, create_date) values ('$id_operator','$id_barang', '$qty','$tgl')";

    $insert = $koneksi->query($query);
    if ($insert) {
?>
        <script>
            alert('Berhasil menambahkan data');
            window.location = "index.php?hal=penjualan_barang_list";
        </script>
<?php
    }
} else {
    $query = $koneksi->query("select * from tbl_barang");
}


?>

<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Penjualan Data Barang</h3>
        </div>


        <form accept="" method="post" action="">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputText">Kode Barang</label>
                    <select name="id_barang" id="" class="form-control" required>
                        <option value="">PILIH</option>
                        <?php while ($data = $query->fetch_array()) : ?>
                            <option value="<?= $data['id_barang']; ?>"><?= $data['nama_barang']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Qty</label>
                    <input type="number" maxlength="50" class="form-control" name="qty">
                </div>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-default">Batal</button>
                <button type="submit" name="proses" class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>