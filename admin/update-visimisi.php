<?php 
        include "../conn.php";
        if($_POST['upload']){
            $id = $_POST['id'];
            $visi  = $_POST['visi'];
            $misi = $_POST['misi'];
            
        $query = mysql_query("UPDATE visimisi SET visi='$visi', misi='$misi' WHERE id='$id'");
            if($query){
                echo "<script>alert('Data Berhasil Di Update'); window.location = 'visimisi.php'</script>";
            }
            else{
                "<script>alert('Data Gagal Di Update'); window.location = 'edit-visimisi.php'</script>";
            }
        }
        ?> 