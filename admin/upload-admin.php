<?php
$namafolder="gambar_admin/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $user_id = $_POST['user_id'];
		$username= $_POST['username'];
		$password=$_POST['password'];
        $fullname=$_POST['fullname'];
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO admin(user_id,username,password,fullname,gambar) VALUES
            ('$user_id','$username','$password','$fullname','$gambar')";
			$res=mysql_query($sql) or die (mysql_error());
			echo "<script>alert('Data Berhasil Di Upload'); window.location = 'admin.php'</script>";	   
		} else {
		   echo "<script>alert('Gambar Gagal Di Upload'); window.location = 'admin.php'</script>";
		}
   } else {
		echo "<script>alert('Format Gambar Salah'); window.location = 'admin.php'</script>";
   }
} else {
	echo "<script>alert('Harus Memasukkan Gambar'); window.location = 'admin.php'</script>";
}

?>
