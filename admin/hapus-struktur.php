<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from struktur WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar/$row[gambar]");
$query=mysql_query("delete from struktur where id='$id'");

if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'struktur.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'struktur.php'</script>";	
}
?>