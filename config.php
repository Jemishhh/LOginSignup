<?php
$con=mysqli_connect ("127.0.0.1", "root", "jemish@123") or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,'intern');
?>

