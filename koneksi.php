<?php

$server="localhost";
$username="root";
$password="";
$database="perpustakaan";

$konek = mysqli_connect ($server,$username,$password,$database);

if (!$konek) {
    die("KONEKSI GAGAL<br>".mysql_connect_error().mysqli_connect_errno());
}
//else {
    //cho "KONEKSI BERHASIL";
//}

?>