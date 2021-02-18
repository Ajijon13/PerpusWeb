<?php 
    include "/conn.php";
    
    header("Content-type:application/pdf");
    readfile($_SERVER['DOCUMENT_ROOT'].'/master/admin/file_pdf_buku/'.$_GET['file_name']);
?>