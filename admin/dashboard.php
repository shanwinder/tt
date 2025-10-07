<?php include 'includes/admin_header.php'; ?>

<h3 class="fw-bold mb-4">
    <i class="bi bi-speedometer2"></i> แดชบอร์ดผู้ดูแลระบบ
</h3>

<?php
$teacherCount   = $pdo->query("SELECT COUNT(*) FROM teachers")->fetchColumn();
$subjectCount   = $pdo->query("SELECT COUNT(*) FROM subjects")->fetchColumn();
$classCount     = $pdo->query("SELECT COUNT(*) FROM classes")->fetchColumn();
$roomCount      = $pdo->query("SELECT COUNT(*) FROM rooms")->fetchColumn();
$timetableCount = $pdo->query("SELECT COUNT(*) FROM timetable")->fetchColumn();
?>

<!-- การ์ดสรุปข้อมูลระบบ -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card text-center shadow-sm border-0">
            <div class="card-body">
                <h1 class="text-primary"><i class="bi bi-person"></i></h1>
                <p class="mb-0">ครูทั้งหมด</p>
                <h3><?= $teacherCount ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm border-0">
            <div class="card-body">
                <h1 class="text-success"><i class="bi bi-book"></i></h1>
                <p class="mb-0">รายวิชา</p>
                <h3><?= $subjectCount ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm border-0">
            <div class="card-body">
                <h1 class="text-warning"><i class="bi bi-people"></i></h1>
                <p class="mb-0">ชั้นเรียน</p>
                <h3><?= $classCount ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm border-0">
            <div class="card-body">
                <h1 class="text-danger"><i class="bi bi-door-open"></i></h1>
                <p class="mb-0">ห้องเรียน</p>
                <h3><?= $roomCount ?></h3>
            </div>
        </div>
    </div>
</div>

<!-- สถิติภาระสอนครู -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-bar-chart"></i> ภาระสอนครู (จำนวนคาบ/สัปดาห์)
    </div>
    <div class="card-body">
        <canvas id="chartWorkload" height="120"></canvas>
    </div>
</div>

<!-- สถิติภาพรวมระบบ -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <i class="bi bi-clipboard-data"></i> ความคืบหน้าการจัดตาราง
            </div>
            <div class="card-body">
                <?php
                $totalClasses = $pdo->query("SELECT COUNT(*) FROM classes")->fetchColumn();
                $hasTimetable = $pdo->query("SELECT COUNT(DISTINCT class_id) FROM timetable")->fetchColumn();
                $progress = $totalClasses > 0 ? round(($hasTimetable / $totalClasses) * 100, 1) : 0;
                ?>
                <h4>จัดตารางแล้ว <?= $progress ?>%</h4>
                <div class="progress" style="height:20px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $progress ?>%;">
                        <?= $progress ?>%
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <i class="bi bi-activity"></i> ภาพรวมวิชาที่เปิดสอน
            </div>
            <div class="card-body">
                <canvas id="chartSubjects"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // กราฟแท่งภาระสอน (mock data)
        const ctx = document.getElementById('chartWorkload');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['ครูไทย', 'ครูคณิต', 'ครูวิทย์', 'ครูคอม', 'ครูอังกฤษ'],
                datasets: [{
                    label: 'คาบ/สัปดาห์',
                    data: [18, 20, 22, 14, 16],
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#17a2b8', '#dc3545']
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // กราฟวงกลมวิชาที่เปิดสอน (mock data)
        const ctx2 = document.getElementById('chartSubjects');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['คณิต', 'ไทย', 'อังกฤษ', 'วิทย์', 'สุขศึกษา', 'คอมพิวเตอร์'],
                datasets: [{
                    data: [10, 8, 6, 5, 4, 3],
                    backgroundColor: ['#007bff', '#ffc107', '#dc3545', '#20c997', '#6f42c1', '#fd7e14']
                }]
            }
        });
    });
</script>

<?php include 'includes/admin_footer.php'; ?>