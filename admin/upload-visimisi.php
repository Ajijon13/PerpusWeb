<?php 
        include "../conn.php";
        if($_POST['upload']){
            $visi    = $_POST['visi'];
            $misi = $_POST['misi'];

            $query=mysql_query("INSERT INTO visimisi VALUES(NULL,'$visi','$misi')");
                if($query){
                    echo "<script>alert('Data Berhasil Di Upload'); window.location = 'visimisi.php'</script>";
                }
                else{
                    echo "<script>alert('Data Gagal Di Upload'); window.location = 'input-visimisi.php'</script>";
                }
        }
        ?> 
       