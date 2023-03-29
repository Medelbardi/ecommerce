<?php 
ob_start();
session_start();
define("DB_HOST","localhost");
define("DB_USER","id19742854_ecommm");
define("DB_PASS","m2]}\ooy)#fV[wy!");
define("DB_NAME","id19742854_ecom");
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
mysqli_set_charset($connection,'utf8');

?>