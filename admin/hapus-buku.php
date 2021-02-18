<?php
include "../conn.php";
	$id = $_GET['kd'];
	$sql=mysql_query("select * from buku_paket WHERE id='$id'");
	$row=mysql_fetch_array($sql);
	unlink("../admin/sampul_buku/$row[gambar_buku]");
	unlink("../admin/file_pdf_buku/$row[file_buku]");
	$query=mysql_query("delete from buku_paket where id='$id'");

		if ($query){
			echo "<script>alert('Data Berhasil dihapus!'); window.location = 'bukupaket.php'</script>";	
		} else {
			echo "<script>alert('Data Gagal dihapus!'); window.location = 'bukupaket.php'</script>";	
		}
		?>