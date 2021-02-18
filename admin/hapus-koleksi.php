<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysql_query("DELETE FROM koleksi WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'koleksi.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'koleksi.php'</script>";	
}
?>