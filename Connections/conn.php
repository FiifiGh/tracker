<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"



$servername = "localhost";
$username = "root";
$password = "";
$db_name = "tracker";
$db_engine = 'mysql';
$port = '3307';

try {
    $conn = new PDO("$db_engine:host=$servername;port=$port;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    { echo "Connection failed: " . $e->getMessage(); }
?>
