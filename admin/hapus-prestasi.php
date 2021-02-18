<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from prestasi WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar/$row[gambar_prestasi]");
$query=mysql_query("delete from prestasi where id='$id'");

if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'prestasi.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'prestasi.php'</script>";	
}
?>