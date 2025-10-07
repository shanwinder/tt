<?php
session_start();
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แดชบอร์ดผู้ดูแลระบบ | ระบบจัดตารางเรียน</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/admin-style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="dashboard.php">
      <i class="bi bi-calendar3-week"></i> ระบบจัดตารางเรียน
    </a>
    <div class="d-flex align-items-center">
      <span class="text-white me-3">ภาคเรียนที่ 1 / 2568</span>
      <a href="../logout.php" class="btn btn-sm btn-light">
        <i class="bi bi-box-arrow-right"></i> ออกจากระบบ
      </a>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
<!-- Sidebar -->
<aside class="col-md-3 col-lg-2 bg-white border-end min-vh-100 p-0">
  <div class="list-group list-group-flush mt-3">

    <div class="list-group-item bg-light fw-bold text-secondary">
      <i class="bi bi-gear"></i> จัดการข้อมูลพื้นฐาน
    </div>
    <a href="timeslots.php" class="list-group-item list-group-item-action">
      <i class="bi bi-clock-history"></i> ตารางเวลา
    </a>
    <a href="classes.php" class="list-group-item list-group-item-action">
      <i class="bi bi-people"></i> ชั้นเรียน
    </a>
    <a href="teachers.php" class="list-group-item list-group-item-action">
      <i class="bi bi-person-lines-fill"></i> ครูผู้สอน
    </a>
    <a href="subjects.php" class="list-group-item list-group-item-action">
      <i class="bi bi-book-half"></i> วิชาเรียน
    </a>
    <a href="rooms.php" class="list-group-item list-group-item-action">
      <i class="bi bi-door-open"></i> ห้องเรียน
    </a>
    <a href="fixed_blocks.php" class="list-group-item list-group-item-action">
      <i class="bi bi-calendar-event"></i> กิจกรรมประจำคาบ
    </a>
    <a href="requirements.php" class="list-group-item list-group-item-action">
      <i class="bi bi-list-task"></i> แผนการสอนรายชั้น
    </a>

    <div class="list-group-item bg-light fw-bold text-secondary mt-3">
      <i class="bi bi-calendar3"></i> จัดตารางและรายงาน
    </div>
    <a href="timetable_auto.php" class="list-group-item list-group-item-action">
      <i class="bi bi-magic"></i> จัดตารางอัตโนมัติ
    </a>
    <a href="timetable_teacher.php" class="list-group-item list-group-item-action">
      <i class="bi bi-person-video3"></i> ตารางสอนครู
    </a>
    <a href="room_usage.php" class="list-group-item list-group-item-action">
      <i class="bi bi-building-check"></i> การใช้ห้องเรียน
    </a>
    <a href="reports.php" class="list-group-item list-group-item-action">
      <i class="bi bi-graph-up"></i> รายงาน / พิมพ์เอกสาร
    </a>

    <div class="list-group-item bg-light fw-bold text-secondary mt-3">
      <i class="bi bi-sliders"></i> ตั้งค่าระบบ
    </div>
    <a href="agencies.php" class="list-group-item list-group-item-action">
      <i class="bi bi-diagram-3"></i> หน่วยงาน / สังกัด
    </a>
    <a href="schools.php" class="list-group-item list-group-item-action">
      <i class="bi bi-bank"></i> ข้อมูลโรงเรียน
    </a>
    <a href="academic_years.php" class="list-group-item list-group-item-action">
      <i class="bi bi-calendar2"></i> ปีการศึกษา / ภาคเรียน
    </a>
    <a href="users.php" class="list-group-item list-group-item-action">
      <i class="bi bi-person-badge"></i> ผู้ใช้งานระบบ
    </a>
    <a href="system_settings.php" class="list-group-item list-group-item-action">
      <i class="bi bi-gear-wide-connected"></i> การตั้งค่าทั่วไป
    </a>

  </div>
</aside>



    <!-- Content -->
    <main class="col-md-9 col-lg-10 p-4">
