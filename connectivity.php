<?php
$host = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "tokenqueue";
$con = mysqli_connect($host,$DB_USER,$DB_PASS,$DB_NAME);
// Check connection
if (mysqli_connect_error())
{
   die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

?>