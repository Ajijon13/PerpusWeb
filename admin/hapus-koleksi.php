<?php
include "../conn.php";
$id = $_GET['kd'];
$query = mysql_query("DELETE FROM koleksi WHERE id='$id'");
header('location:koleksi.php');
?>