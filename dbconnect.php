<?php
$user='haris';
$pass='passwd';
$host='localhost';
$db = 'kremala';


$mysqli = new mysqli($host, $user, $pass, $db,null,'/home/staff/asidirop/mysql/run/mysql.sock');
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . 
    $mysqli->connect_errno . ") " . $mysqli->connect_error;
}?>

