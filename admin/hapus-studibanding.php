<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from studibanding WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar/$row[gambar_studi]");
$query=mysql_query("delete from studibanding where id='$id'");

if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'studibanding.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'studibanding.php'</script>";	
}
?>