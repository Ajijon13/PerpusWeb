<?php

include "../conn.php";

    $nama = $_FILES['gambar']['name'];
    $id     = $_POST['id'];
    $kunjungan = $_POST['kunjungan'];
    $keterangan = $_POST['keterangan'];

        if(isset($_POST['upload'])) {
        
        $eks_dibolehkan = ['png', 'jpg']; // ekstensi yang diperbolehkan
        $x = explode('.', $nama); // memisahkan nama file dengan ekstensi
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];

            // cek ekstensi yang dibolehkan
            if(in_array($ekstensi, $eks_dibolehkan) === true) {
                move_uploaded_file($file_tmp, 'gambar/' . $nama); // memindahkan file gambar
            
                // jalankan query insert
                $query = ("UPDATE studibanding SET gambar_studi='$nama',kunjungan='$kunjungan',keterangan='$keterangan' WHERE id='$id'");
                $hasil = mysql_query($query);

                if($hasil) {
                    echo "<script>alert('Data berhasil Di Update'); window.location = 'studibanding.php'</script>";
                    } else {
                    echo "<script>alert('Data gagal Di Update');window.location = 'studibanding.php'</script>";
                    }
                    }else {
                    echo "<script>alert('Data belum lengkap')</script>";
                    }
                    }else {
                    echo "<script>alert('Ekstensi harus PNG / JPG')</script>";
                    }
?>