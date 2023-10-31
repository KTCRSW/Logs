<?php
require('fpdf/fpdf.php');
// require_once '../DB/db.php';
// include '../Asset/Header.php';
/*A4 width : 219mm*/

$pdf = new FPDF('P','mm','A4');



$pdf->AddPage();
/*output the result*/

/*set font to THSarabunNew, bold, 14pt*/
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew','B',12);

/*Cell(width , height , text , border , end line , [align] )*/
$pdf->Image('../Asset/Img/logo.png', 10, 10, -300);
$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(200 ,5,iconv('UTF-8', 'cp874','"IT NETWORK" 527 NonPibun , Amphoe Mueng Udonthani 41150'),0,1);
$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(200 ,7,iconv('UTF-8', 'cp874','"ไอที เน็ตเวิร์ค" 527 ซ.โนนพิบูลย์ , ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41150'),0,1);
$pdf->Cell(90,10,'',0,0);
$pdf->Cell(205 ,7,iconv('UTF-8', 'cp874','Tel./ โทรศัพท์ 084-519989 042-324052'),0,1);
$pdf->Cell(92,11,'',0,0);
$pdf->Cell(205 ,7,iconv('UTF-8', 'cp874','เลขประจำตัวผู้เสียภาษี 1101400073313'),0,1);

include '../DB/db.php';
$sql = 'SELECT * FROM mains WHERE LOGS_CASE_NUMBER = "'.$_POST['__caseNumber'].'"';
$query = $db->query($sql);

while ($item = mysqli_fetch_assoc($query)) {

$pdf->SetFont('THSarabunNew','B',14);
$pdf->Cell(0, 10,iconv('UTF-8', 'cp874','เลขแจ้งเคส : '. $item['LOGS_CASE_NUMBER']), 0, 1);
$pdf->Cell(0, 5,iconv('UTF-8', 'cp874', 'วันที่แจ้งดำเนินงาน : '. $item['LOGS_DATE']), 0, 1);

$pdf->Cell(40, 15,iconv('UTF-8', 'cp874', 'สถานที่เข้างาน'), 1); 
$pdf->Cell(60, 15,iconv('UTF-8', 'cp874', 'ชื่อผู้ติดต่อ'), 1);
$pdf->Cell(30, 15, iconv('UTF-8', 'cp874', 'เบอร์โทรศัพท์'), 1);
$pdf->Cell(30, 15, iconv('UTF-8', 'cp874', 'ระยะเวลาดำเนินงาน'), 1);
$pdf->Cell(30, 15, iconv('UTF-8', 'cp874', 'ช่างผู้ดำเนินงาน'), 1);


$pdf->Ln(); 
$pdf->SetFont('THSarabunNew','',14);

    $pdf->Cell(40, 15, iconv('UTF-8', 'cp874', $item['LOGS_LOCATION']), 1);
    $pdf->Cell(60, 15, iconv('UTF-8', 'cp874', $item['LOGS_CASE_CONTACT']), 1);
    $pdf->Cell(30, 15, iconv('UTF-8', 'cp874', $item['LOGS_PHONE']), 1);
    $pdf->Cell(30, 15, iconv('UTF-8', 'cp874', $item['LOGS_RANGE_TIME']), 1);
    $pdf->Cell(30, 15, iconv('UTF-8', 'cp874', $item['LOGS_TECHNICIANS']), 1);
    $pdf->Ln(); // Move to the next line
}

// Add a total amount





$pdf->Output();

?>