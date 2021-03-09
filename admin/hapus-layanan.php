<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from layanan WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar_inovasi/$row[g_layanan]");
$query=mysql_query("delete from layanan where id='$id'");

header('location:layanan.php');
?>