<?php 
        include "../conn.php";
        if($_POST['upload']){
            $t_tertib    = $_POST['t_tertib'];

            $query=mysql_query("INSERT INTO tatatertib VALUES(NULL,'$t_tertib')");
                if($query){
                    echo "<script>alert('Data Berhasil Di Upload'); window.location = 'tatatertib.php'</script>";
                }
                else{
                    echo "<script>alert('Data Gagal Di Upload'); window.location = 'input-tatatertib.php'</script>";
                }
        }
        ?> 
       