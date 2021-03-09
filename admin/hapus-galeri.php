<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from galeri WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar_galeri/$row[gambar_galeri]");
$query=mysql_query("delete from galeri where id='$id'");

header('location:galeri.php');
?>