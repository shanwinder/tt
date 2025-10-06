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
  <!-- Animate -->
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
    <aside class="col-md-3 col-lg-2 bg-white border-end min-vh-100 p-0">
      <div class="list-group list-group-flush mt-3">
        <a href="dashboard.php" class="list-group-item list-group-item-action active">
          <i class="bi bi-speedometer2"></i> แดชบอร์ด
        </a>
        <a href="teachers.php" class="list-group-item list-group-item-action">
          <i class="bi bi-person-lines-fill"></i> ข้อมูลครู
        </a>
        <a href="subjects.php" class="list-group-item list-group-item-action">
          <i class="bi bi-book-half"></i> ข้อมูลรายวิชา
        </a>
        <a href="classes.php" class="list-group-item list-group-item-action">
          <i class="bi bi-people"></i> ชั้นเรียน
        </a>
        <a href="rooms.php" class="list-group-item list-group-item-action">
          <i class="bi bi-door-open"></i> ห้องเรียน
        </a>
        <a href="requirements.php" class="list-group-item list-group-item-action">
          <i class="bi bi-list-task"></i> แผนการสอน
        </a>
        <a href="timetable_auto.php" class="list-group-item list-group-item-action">
          <i class="bi bi-magic"></i> จัดตารางอัตโนมัติ
        </a>
        <a href="reports.php" class="list-group-item list-group-item-action">
          <i class="bi bi-file-earmark-text"></i> รายงาน/พิมพ์เอกสาร
        </a>
      </div>
    </aside>

    <!-- Content -->
    <main class="col-md-9 col-lg-10 p-4">
