<?php
error_reporting(E_ERROR | E_PARSE);
$db_name = "db_perpus";

mysql_connect("localhost","root","");
mysql_select_db("db_perpus");


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'db_perpus');

// Buat Koneksinya
$db1 = new mysqli(HOST, USER, PASS, DB1);

?>