<?php
if(isset($_SESSION['login'])){
    header("location: http://localhost/wpb_inventori/index.php?hal=home");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in | Operator</title>

    <base href="http://localhost/wpb_inventori/" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="./dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="./index2.html"><b>Operator</b> Login</a>
        </div>

        <?php if (isset($_POST['submit'])) : ?>

            <?php
            include("conn.php");
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $data = $koneksi->query("SELECT * from tbl_operator where username='$username'") or die($koneksi->error);
            //pakai password verifi
            if ($data->num_rows > 0) {
                $_SESSION["login"] = $data->fetch_assoc();
                if(password_verify($_POST['password'], $_SESSION["login"]['password'])){
                    
                echo "<script>alert('login berhasil'); window.location = './index.php?hal=home';</script>";
                }else{
                    echo "<script>alert('login gagal');</script>";
                }
            } else {
                echo "<script>alert('login gagal');</script>";
            }
            ?>

        <?php endif; ?>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button name="submit" type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>


    <script src="./plugins/jquery/jquery.min.js"></script>

    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="./dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>