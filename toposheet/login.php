<?php //login.php
$db_hostname = 'localhost';
$db_database = 'csredataproducts';
$db_username = '*****'; // add username
$db_password = '*****'; // add password
// Connect to server.
$db_server = mysql_connect($db_hostname, $db_username, $db_password) or die("Unable to connect to MySQL: " . mysql_error());
// Select the database.
mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());
//********************************************************************************
// Author/s: Suryakant Sawant, <add your name>
// Email/s: suryakant54321@gmail.com, <add your email>
// Date>>Update: 20 June 2013 >> 05 May 2016 >> <add new>										
// Permissions: Feel Free to change/ edit any part of code. Just keep this section as is :)
//********************************************************************************
?>