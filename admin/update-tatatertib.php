<?php 
        include "../conn.php";
        if($_POST['upload']){
            $id = $_POST['id'];
            $t_tertib  = $_POST['t_tertib'];
            
        $query = mysql_query("UPDATE tatatertib SET t_tertib='$t_tertib' WHERE id='$id'");
            if($query){
                echo "<script>alert('Data Berhasil Di Update'); window.location = 'tatatertib.php'</script>";
            }
            else{
                echo "<script>alert('Data Gagal Di Update'); window.location = 'edit-tatatertib.php'</script>";
            }
        }
        ?> 
    