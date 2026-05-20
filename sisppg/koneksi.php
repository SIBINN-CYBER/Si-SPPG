<?php
$host = "localhost";
$user = "root";
<<<<<<< HEAD:sisppg/koneksi.php
$pass = "120408";
=======
$pass = "";
>>>>>>> 01610564ca39128da84ad629f247434c762eb480:koneksi.php
$db = "db_si_sppg";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function check_and_reconnect($koneksi) {
    if (!mysqli_ping($koneksi)) {
        $koneksi = mysqli_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass'], $GLOBALS['db']);
        if (!$koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }
    return $koneksi;
}
?>
