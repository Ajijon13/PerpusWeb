<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysql_query("DELETE FROM tatatertib WHERE id='$id'");
header('location:tatatertib.php');
?>