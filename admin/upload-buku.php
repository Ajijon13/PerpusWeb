<?php 
        include "../conn.php";
        if($_POST['upload']){
            $judul              = $_POST['judul'];
            $pengarang          = $_POST['pengarang'];
            $tempatdanpenerbit  = $_POST['tempatdanpenerbit'];
            $isbn               = $_POST['isbn'];
            $jumlahhalaman      = $_POST['jumlahhalaman'];
            $kategori           = $_POST['kategori'];
            $ekstensi_diperbolehkan    = array('pdf','docx', 'png', 'jpeg', 'jpg');
            $nama    = $_FILES['file_buku']['name'];
            $nama1    = $_FILES['gambar_buku']['name'];
            $x        = explode('.', $nama);
            $ekstensi    = strtolower(end($x));
            $ukuran        = $_FILES['file_buku']['size'];
            $file_tmp    = $_FILES['file_buku']['tmp_name'];
            $file_tmp1    = $_FILES['gambar_buku']['tmp_name']; 
         
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 20440700){ 
                    move_uploaded_file($file_tmp, 'file_pdf_buku/'.$nama) &&
                    move_uploaded_file($file_tmp1,'sampul_buku/'.$nama1);
                    $query=mysql_query("INSERT INTO buku_paket VALUES(NULL, '$judul','$pengarang','$tempatdanpenerbit','$isbn','$jumlahhalaman','$kategori','$nama','$nama1')");
                    if($query){
                        echo "<script>alert('Data berhasil diupload'); window.location = 'bukupaket.php'</script>";
                    }
                    else{
                        echo "<script>alert('Data gagal diupload'); window.location = 'bukupaket.php'</script>";
                    }
                }
                else{
                    echo "<script>alert('Ukuran File Terlalu Besar'); window.location = 'bukupaket.php'</script>";
                }
            }
            else{
                echo "<script>alert('Ekstensi File Harus Pdf dan Docx'); window.location = 'bukupaket.php'</script>";
            }
        }
        ?> 