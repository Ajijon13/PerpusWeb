
<?php
include "../conn.php";
	$id = $_GET['kd'];
	$sql=mysql_query("select * from data_ebook WHERE id='$id'");
	$row=mysql_fetch_array($sql);
	unlink("../admin/sampul_ebook/$row[gambar_ebook]");
	unlink("../admin/file_pdf/$row[file_ebook]");
	$query=mysql_query("delete from data_ebook where id='$id'");

		header('location:ebook.php');
		?>