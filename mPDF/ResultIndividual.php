<?php
    header("Location: ResultIndividual.pdf");

require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
]);

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานทั้งหมด</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }

        table, th, td {
            border: 1px solid black;
            margin: 18px;
            padding: 10px;
        }

        th {
            background-color: grey;
        }
    </style>
</head>
<body>
<div class="container">
    <span><img src="../Asset/Img/logo.png" alt="Your Logo" width="256" style="float:left;"></span>
    <center>
        <p align="right">"IT NETWORK" 112 Village No. 4 Mittraphap Road, Chiang Wang Subdistrict,<br>Phen District, UdonThani Province 41150<br>"ไอที เน็ตเวิร์ค" 112 หมู่ 4 ถ.มิตรภาพ ต.เชียงหวาง อ.เพ็ญ จ.อุดรธานี 41150<br>Tel. / โทรศัพท์ 093-1196111, 084-5199890<br>เลขที่ประจำตัวผู้เสียภาษี 1101400073313</p>
    </center>

    <?php
    require '../DB/db.php';

    $technician = $_GET['technician'];
    $sql = "SELECT * FROM mains WHERE LOGS_TECHNICIANS = '$technician'";
    $result = $db->query($sql);

    $totalRows = mysqli_num_rows($result);
    $rowsPerPage = 18;

    $currentPage = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        if (($currentPage - 1) % $rowsPerPage == 0) {
            if ($currentPage != 1) {
                $mpdf->AddPage();
            }
            ?>
            <table class="table table-striped">
                <tr>
                    <th width="10px">เลขที่</th>
                    <th>เลขแจ้งเคส</th>
                    <th>วันที่แจ้งดำเนินงาน</th>
                    <th>สถานที่เข้างาน</th>
                    <th>ช่างผู้ทำงาน</th>
                </tr>
            <?php
        }
        ?>
        <tr>
            <td><?= $currentPage ?></td>
            <td><?= $row['LOGS_CASE_NUMBER'] ?></td>
            <td><?= $row['LOGS_DATE'] ?></td>
            <td><?= $row['LOGS_LOCATION'] ?></td>
            <td><?= $row['LOGS_TECHNICIANS'] ?></td>
        </tr>
        <?php
        $currentPage++;

        if (($currentPage - 1) % $rowsPerPage == 0) {
            ?>
            </table>
            <?php
        }
    }
    // Close the table if it's not closed yet
    if (($currentPage - 1) % $rowsPerPage != 0) {
        ?>
        </table>
        <?php
    }
    ?>

    <p align="right">วันที่พิมพ์ : <i><?= date('d-m-Y'); ?></i></p>

    <?php
    $html = ob_get_contents();
    $mpdf->WriteHTML($html);
    $mpdf->Output("ResultIndividual.pdf");
    ob_end_flush();

    ?>
</div>
</body>
</html>
