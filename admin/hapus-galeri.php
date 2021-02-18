<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from galeri WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar/$row[gambar_galeri]");
$query=mysql_query("delete from galeri where id='$id'");

if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'galeri.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'galeri.php'</script>";	
}
?>