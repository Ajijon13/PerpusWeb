<?php

include "../conn.php";

    $gambar_studi = $_FILES['gambar']['name'];
    $keterangan = $_POST['keterangan'];
    $kunjungan = $_POST['kunjungan'];

        if(isset($_POST['upload'])) {
        
        $eks_dibolehkan = ['png', 'jpg']; // ekstensi yang diperbolehkan
        $x = explode('.', $gambar_studi); // memisahkan nama file dengan ekstensi
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];

            // cek ekstensi yang dibolehkan
            if(in_array($ekstensi, $eks_dibolehkan) === true) {
                move_uploaded_file($file_tmp, 'gambar/' . $gambar_studi); // memindahkan file gambar
            
                // jalankan query insert
                $query = "INSERT INTO studibanding (gambar_studi,keterangan,kunjungan) VALUES ('$gambar_studi','$keterangan','$kunjungan')";
                $hasil = mysql_query($query);

                if($hasil) {
                    echo "<script>alert('Data berhasil disimpan'); window.location = 'studibanding.php'</script>";
                    } else {
                    echo "<script>alert('Data gagal disimpan');window.location = 'studibanding.php'</script>";
                    }
                    } else {
                    echo "<script>alert('Ekstensi harus PNG / JPG')</script>";
                    }
                    } else {
                    echo "<script>alert('Data belum lengkap')</script>";
                    }
?>