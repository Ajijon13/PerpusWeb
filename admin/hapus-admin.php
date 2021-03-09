<?php
include "../conn.php";
	$user_id = $_GET['kd'];
	$sql=mysql_query("select * from admin WHERE user_id='$user_id'");
	$row=mysql_fetch_array($sql);
	unlink("../admin/gambar_admin/$row[gambar_admin]");
	$query=mysql_query("delete from admin WHERE user_id='$user_id'");

		header('location:admin.php');
		?>