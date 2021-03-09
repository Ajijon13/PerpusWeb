<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from struktur WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar/$row[gambar]");
$query=mysql_query("delete from struktur where id='$id'");

header('location:struktur.php');
?>