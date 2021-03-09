<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from prestasi WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar_prestasi/$row[gambar_prestasi]");
$query=mysql_query("delete from prestasi where id='$id'");

header('location:prestasi.php');

?>