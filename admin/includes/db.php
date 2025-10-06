<?php
// File: /admin/includes/db.php

$host = "localhost";
$dbname = "school_timetable";
$username = "root";  // ของ MAMP ปกติคือ root
$password = "root";  // ถ้าใช้ MAMP default (หรือ "" ถ้าไม่มี)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set('Asia/Bangkok');
} catch (PDOException $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
?>
