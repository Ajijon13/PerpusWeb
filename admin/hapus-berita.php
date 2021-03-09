<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from berita WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar_berita/$row[gambar_berita]");
$query=mysql_query("delete from berita where id='$id'");

	header('location:berita.php');

?>