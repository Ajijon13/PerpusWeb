<?php
$db_name = "db_perpuspro";

mysql_connect("localhost","root","");
mysql_select_db("db_perpuspro");


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'db_perpuspro');

// Buat Koneksinya
$db1 = new mysqli(HOST, USER, PASS, DB1);

?>