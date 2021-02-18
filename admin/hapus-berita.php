<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from berita WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar/$row[gambar_berita]");
$query=mysql_query("delete from berita where id='$id'");

if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'berita.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'berita.php'</script>";	
}
?>