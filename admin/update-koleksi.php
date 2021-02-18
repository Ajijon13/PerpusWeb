<?php 
        include "../conn.php";
        if($_POST['upload']){
            $id = $_POST['id'];
            $tgl_input = $_POST['tgl_input'];
            $koleksi = $_POST['koleksi'];
            $keterangan = $_POST['keterangan'];
            $jumlah = $_POST['jumlah'];
            $tambahan  = $_POST['tambahan'];
            $total = $_POST['total'];
            
        $query = mysql_query("UPDATE `koleksi` SET `tgl_input`='$tgl_input',`koleksi`='$koleksi',`keterangan`='$keterangan',`jumlah`='$jumlah',`tambahan`='$tambahan',`total`='$total' WHERE id='$id'");
            if($query){
                echo "<script>alert('Data Berhasil Di Update'); window.location = 'koleksi.php'</script>";
            }
            else{
                echo "<script>alert('Data Gagal Di Update'); window.location = 'koleksi.php'</script>";
            }
        }
        ?> 

