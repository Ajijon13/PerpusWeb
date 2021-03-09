<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from studibanding WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar_studi/$row[gambar_studi]");
$query=mysql_query("delete from studibanding where id='$id'");

header('location:studibanding.php');
?>