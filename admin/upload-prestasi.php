<?php

include "../conn.php";

    $gambar_prestasi = $_FILES['gambar']['name'];
    $keterangan = $_POST['keterangan'];

        if(isset($_POST['upload'])) {
        
        $eks_dibolehkan = ['png', 'jpg']; // ekstensi yang diperbolehkan
        $x = explode('.', $gambar_prestasi); // memisahkan nama file dengan ekstensi
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];

            // cek ekstensi yang dibolehkan
            if(in_array($ekstensi, $eks_dibolehkan) === true) {
                move_uploaded_file($file_tmp, 'gambar/' . $gambar_prestasi); // memindahkan file gambar
            
                // jalankan query insert
                $query = "INSERT INTO prestasi (id,keterangan,gambar_prestasi) VALUES (null,'$keterangan','$gambar_prestasi')";
                $hasil = mysql_query($query);

                if($hasil) {
                    echo "<script>alert('Data berhasil disimpan'); window.location = 'prestasi.php'</script>";
                    } else {
                    echo "<script>alert('Data gagal disimpan'); window.location = 'prestasi.php'</script>";
                    }
                    } else {
                    echo "<script>alert('Ekstensi harus PNG / JPG'); window.location = 'prestasi.php'</script>";
                    }
                    } else {
                    echo "<script>alert('Data belum lengkap'); window.location = 'prestasi.php'</script>";
                    }
?>