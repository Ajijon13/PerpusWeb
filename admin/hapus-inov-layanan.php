<?php
include "../conn.php";
$id = $_GET['kd'];
$sql=mysql_query("select * from inov_layanan WHERE id='$id'");
$row=mysql_fetch_array($sql);
unlink("../admin/gambar/$row[g_inovasi]");
$query=mysql_query("delete from inov_layanan where id='$id'");

if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'inov_layanan.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'inov_layanan.php'</script>";	
}
?>