<?php 
        include "../conn.php";
        if($_POST['upload']){
            $id = $_POST['id'];
            $namaperpus  = $_POST['namaperpus'];
            $alamat = $_POST['alamat'];
            $kec    = $_POST['kec'];
            $kab = $_POST['kab'];
            $prov    = $_POST['prov'];
            $nomor = $_POST['nomor'];
            $webe    = $_POST['webe'];
            $status = $_POST['status'];
            $sk    = $_POST['sk'];
            $tahun = $_POST['tahun'];
            $npsn    = $_POST['npsn'];
            $luas = $_POST['luas'];
            $no_i    = $_POST['no_i'];
            $namaks = $_POST['namaks'];
            $namakp    = $_POST['namakp'];
            $nosk = $_POST['nosk']; 
            
        $query = mysql_query("UPDATE profil SET namaperpus='$namaperpus', alamat='$alamat', kec='$kec', kab='$kab', prov='$prov', nomor='$nomor', webe='$webe', status='$status', sk='$sk', tahun='$tahun', npsn='$npsn', luas='$luas', no_i='$no_i', namaks='$namaks', namakp='$namakp', nosk='$nosk' WHERE id='$id'");
            if($query){
                echo "<script>alert('Data Berhasil Di Update'); window.location = 'profil.php'</script>";
            }
            else{
                echo "<script>alert('Data Berhasil Di Update'); window.location = 'profil.php'</script>";
            }
        }