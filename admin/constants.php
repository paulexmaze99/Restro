<?php
 session_start();


define('SITEURL' , 'http://localhost/Restaurant/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME' , 'root' );
define('DB_PASSWORD' , '');
Define('DB_NAME' , 'restro');





$conn = mysqli_connect (LOCALHOST, DB_USERNAME, DB_PASSWORD,) or die('connection failed');

$db_select = mysqli_select_db( $conn, DB_NAME) or die('connection failed');



?>