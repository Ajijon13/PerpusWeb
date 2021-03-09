<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from inov_layanan WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar_inovasi/$row[gambar_inovasi]");
$query=mysql_query("delete from inov_layanan where id='$id'");

header('location:inov-layanan.php');
?>