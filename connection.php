<?php
require('constants.php');
$_SESSION['success'] = "";
try {
    $conn = new PDO("mysql:host=$servername", $username_conn, $password_conn);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $sql = "CREATE DATABASE IF NOT EXISTS $db;";
    $conn->exec($sql);
    $sql = "USE $db;";
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>