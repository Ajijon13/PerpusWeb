<?php 
    include "../conn.php";
    if($_POST['upload']){
        $tgl_input = $_POST['tgl_input'];
        $koleksi = $_POST['koleksi'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $tambahan  = $_POST['tambahan'];
        $total = $_POST['total'];

        $query = mysql_query("insert into koleksi (id, tgl_input, koleksi, keterangan, jumlah, tambahan, total)
                values (null, '$tgl_input', '$koleksi', '$keterangan', '$jumlah', '$tambahan', '$total');
        ");
        if($query){
            echo "<script>alert('Data Berhasil Di Upload'); window.location = 'koleksi.php'</script>";
        }
        else{
            echo "<script>alert('Data Gagal Di Upload'); window.location = 'input-koleksi.php'</script>";
        }
    }
?>