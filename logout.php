<?php

include "conn.php";

session_destroy();

?>

<script>alert("Logout Berhasil"); window.location = 'http://localhost/wpb_inventori/login.php';</script>