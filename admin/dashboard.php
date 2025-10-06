<?php include 'includes/admin_header.php'; ?>

<h3 class="fw-bold mb-4">
    <i class="bi bi-speedometer2"></i> แดชบอร์ดผู้ดูแลระบบ
</h3>

<!-- การ์ดสรุปภาพรวม -->
<div class="row g-3 mb-4">
    <?php
    $teacherCount = $pdo->query("SELECT COUNT(*) FROM teachers")->fetchColumn();
    $subjectCount = $pdo->query("SELECT COUNT(*) FROM subjects")->fetchColumn();
    $classCount = $pdo->query("SELECT COUNT(*) FROM classes")->fetchColumn();
    $timetableCount = $pdo->query("SELECT COUNT(*) FROM timetable")->fetchColumn();
    ?>

    <div class="col-md-3">
        <div class="card text-center shadow-sm border-0 animate__animated animate__fadeInUp">
            <div class="card-body">
                <h5 class="text-primary"><i class="bi bi-person"></i></h5>
                <h6>ครูทั้งหมด</h6>
                <h3><?= $teacherCount ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm border-0 animate__animated animate__fadeInUp">
            <div class="card-body">
                <h5 class="text-success"><i class="bi bi-book"></i></h5>
                <h6>รายวิชา</h6>
                <h3><?= $subjectCount ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm border-0 animate__animated animate__fadeInUp">
            <div class="card-body">
                <h5 class="text-warning"><i class="bi bi-people"></i></h5>
                <h6>ชั้นเรียน</h6>
                <h3><?= $classCount ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm border-0 animate__animated animate__fadeInUp">
            <div class="card-body">
                <h5 class="text-danger"><i class="bi bi-calendar2-check"></i></h5>
                <h6>ข้อมูลตารางสอน</h6>
                <h3><?= $timetableCount ?></h3>
            </div>
        </div>
    </div>
</div>

<!-- กราฟภาระสอนครู -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-bar-chart"></i> ภาระสอนครู (จำนวนคาบ/สัปดาห์)
    </div>
    <div class="card-body">
        <canvas id="teacherWorkloadChart" height="120"></canvas>
    </div>
</div>

<!-- ตารางครูล่าสุด -->
<div class="card shadow-sm">
    <div class="card-header bg-secondary text-white">
        <i class="bi bi-clock-history"></i> ครูผู้สอนในระบบ
    </div>
    <div class="card-body">
        <table id="teacherTable" class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>ชื่อครู</th>
                    <th>กลุ่มสาระ</th>
                    <th>อีเมล</th>
                    <th>เบอร์ติดต่อ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM teachers ORDER BY id DESC");
                $i = 1;
                foreach ($stmt as $row): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($row['fullname']) ?></td>
                        <td><?= htmlspecialchars($row['subject_group']) ?></td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#teacherTable').DataTable();

        // ดึงข้อมูลกราฟ (ตัวอย่างแบบสุ่ม)
        const ctx = document.getElementById('teacherWorkloadChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['ครูไทย', 'ครูคณิต', 'ครูวิทย์', 'ครูคอม', 'ครูอังกฤษ'],
                datasets: [{
                    label: 'จำนวนคาบ/สัปดาห์',
                    data: [20, 18, 22, 15, 16],
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#17a2b8', '#dc3545']
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>

<?php include 'includes/admin_footer.php'; ?>