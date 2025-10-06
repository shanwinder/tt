<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h2>สวัสดีจากระบบจัดตารางเรียน</h2><p>mPDF ทำงานได้แล้ว!</p>');
$mpdf->Output('test.pdf', 'I');
