<?php

include "../conn.php";

    $gambar = $_FILES['gambar']['name'];
    $keterangan = $_POST['keterangan'];

        if(isset($_POST['upload'])) {
        
        $eks_dibolehkan = ['png', 'jpg']; // ekstensi yang diperbolehkan
        $x = explode('.', $gambar); // memisahkan nama file dengan ekstensi
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];

            // cek ekstensi yang dibolehkan
            if(in_array($ekstensi, $eks_dibolehkan) === true) {
                move_uploaded_file($file_tmp, 'gambar/' . $gambar); // memindahkan file gambar
            
                // jalankan query insert
                $query = "INSERT INTO struktur (keterangan,gambar) VALUES ('$keterangan','$gambar')";
                $hasil = mysql_query($query);

                if($hasil) {
                    echo "<script>alert('Data berhasil disimpan'); window.location = 'struktur.php'</script>";
                    } else {
                    echo "<script>alert('Data gagal disimpan')</script>";
                    }
                    } else {
                    echo "<script>alert('Ekstensi harus PNG / JPG')</script>";
                    }
                    } else {
                    echo "<script>alert('Data belum lengkap')</script>";
                    }
?>