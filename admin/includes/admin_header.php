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
    <aside class="col-md-3 col-lg-2 bg-white border-end min-vh-100 p-0">
      <div class="accordion accordion-flush mt-3" id="sidebarMenu">

        <!-- Dashboard -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <a href="dashboard.php" class="list-group-item list-group-item-action fw-bold text-primary border-0">
              <i class="bi bi-speedometer2"></i> แดชบอร์ดภาพรวม
            </a>
          </h2>
        </div>

        <!-- หมวด 1: ข้อมูลพื้นฐาน -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingBase">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBase" aria-expanded="false">
              <i class="bi bi-folder2-open me-2"></i> จัดการข้อมูลพื้นฐาน
            </button>
          </h2>
          <div id="collapseBase" class="accordion-collapse collapse" data-bs-parent="#sidebarMenu">
            <div class="list-group list-group-flush">
              <a href="timeslots.php" class="list-group-item list-group-item-action"><i class="bi bi-clock"></i> ตารางเวลา</a>
              <a href="classes.php" class="list-group-item list-group-item-action"><i class="bi bi-people"></i> ชั้นเรียน</a>
              <a href="teachers.php" class="list-group-item list-group-item-action"><i class="bi bi-person-lines-fill"></i> ครูผู้สอน</a>
              <a href="subjects.php" class="list-group-item list-group-item-action"><i class="bi bi-book-half"></i> วิชาเรียน</a>
              <a href="rooms.php" class="list-group-item list-group-item-action"><i class="bi bi-door-open"></i> ห้องเรียน</a>
              <a href="fixed_blocks.php" class="list-group-item list-group-item-action"><i class="bi bi-pause-circle"></i> กิจกรรมประจำคาบ</a>
              <a href="requirements.php" class="list-group-item list-group-item-action"><i class="bi bi-list-task"></i> แผนการสอนรายชั้น</a>
            </div>
          </div>
        </div>

        <!-- หมวด 2: การจัดตารางและรายงาน -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingSchedule">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSchedule" aria-expanded="false">
              <i class="bi bi-calendar-check me-2"></i> จัดตารางและรายงาน
            </button>
          </h2>
          <div id="collapseSchedule" class="accordion-collapse collapse" data-bs-parent="#sidebarMenu">
            <div class="list-group list-group-flush">
              <a href="timetable_auto.php" class="list-group-item list-group-item-action"><i class="bi bi-magic"></i> จัดตารางอัตโนมัติ</a>
              <a href="timetable_teacher.php" class="list-group-item list-group-item-action"><i class="bi bi-person-badge"></i> ข้อมูลตารางสอนครู</a>
              <a href="room_usage.php" class="list-group-item list-group-item-action"><i class="bi bi-house-check"></i> ข้อมูลการใช้ห้องเรียน</a>
              <a href="reports.php" class="list-group-item list-group-item-action"><i class="bi bi-file-earmark-bar-graph"></i> รายงาน / พิมพ์เอกสาร</a>
            </div>
          </div>
        </div>

        <!-- หมวด 3: ตั้งค่าระบบ -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingSettings">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSettings" aria-expanded="false">
              <i class="bi bi-gear me-2"></i> ตั้งค่าระบบ
            </button>
          </h2>
          <div id="collapseSettings" class="accordion-collapse collapse" data-bs-parent="#sidebarMenu">
            <div class="list-group list-group-flush">
              <a href="agencies.php" class="list-group-item list-group-item-action"><i class="bi bi-building"></i> หน่วยงาน / สังกัด</a>
              <a href="schools.php" class="list-group-item list-group-item-action"><i class="bi bi-bank"></i> ข้อมูลโรงเรียน</a>
              <a href="academic_years.php" class="list-group-item list-group-item-action"><i class="bi bi-calendar3"></i> ปีการศึกษา / ภาคเรียน</a>
              <a href="users.php" class="list-group-item list-group-item-action"><i class="bi bi-people-fill"></i> ผู้ใช้งานระบบ</a>
              <a href="system_settings.php" class="list-group-item list-group-item-action"><i class="bi bi-sliders"></i> การตั้งค่าทั่วไป</a>
            </div>
          </div>
        </div>

      </div>
    </aside>

    <!-- Content -->
    <main class="col-md-9 col-lg-10 p-4">
