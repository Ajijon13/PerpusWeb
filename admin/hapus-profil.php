<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysql_query("DELETE FROM profil WHERE id='$id'");
header('location:profil.php');
?>