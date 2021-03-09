<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysql_query("DELETE FROM visimisi WHERE id='$id'");
header('location:visimisi.php');
?>