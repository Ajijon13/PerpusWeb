<?php
include "../conn.php";
$user_id = $_GET['kd'];
$sql=mysql_query("select * from admin WHERE user_id='$user_id'");
	$row=mysql_fetch_array($sql);
	$query=mysql_query("delete from admin where user_id='$user_id'");

if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'admin.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'admin.php'</script>";	
}
?>