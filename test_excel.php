<?php
require_once __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'ทดสอบการสร้าง Excel');
$sheet->setCellValue('A2', 'พร้อมใช้งานแล้ว');

$writer = new Xlsx($spreadsheet);
$writer->save('test.xlsx');

echo "✅ สร้างไฟล์ test.xlsx สำเร็จ! ตรวจในโฟลเดอร์ tt ได้เลย";
