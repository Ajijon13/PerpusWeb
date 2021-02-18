<?php 
        include "../conn.php";
        if($_POST['upload']){
            $namaperpus    = $_POST['namaperpus'];
            $alamat = $_POST['alamat'];
            $kec    = $_POST['kec'];
            $kab = $_POST['kab'];
            $prov    = $_POST['prov'];
            $nomor = $_POST['nomor'];
            $webe    = $_POST['webe'];
            $statu = $_POST['status'];
            $sk    = $_POST['sk'];
            $tahun = $_POST['tahun'];
            $npsn    = $_POST['npsn'];
            $luas = $_POST['luas'];
            $no_i   = $_POST['no_i'];
            $namaks = $_POST['namaks'];
            $namakp    = $_POST['namakp'];
            $nosk = $_POST['nosk']; 

            $query=mysql_query("INSERT INTO profil VALUES(NULL,'$namaperpus','$alamat','$kec','$kab','$prov','$nomor','$webe','$statu','$sk','$tahun','$npsn','$luas','$no_i','$namaks','$namakp','$nosk')");
                if($query){
                    echo "<script>alert('Data Berhasil Di Upload'); window.location = 'profil.php'</script>";
                }
                else{
                    echo "<script>alert('Data Berhasil Di Upload'); window.location = 'profil.php'</script>";
                }
        }
        ?> 