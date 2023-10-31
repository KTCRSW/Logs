<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once '../DB/db.php';
include '../Asset/Header.php';

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
            'BI'=> 'THSarabunNew BoldItalic.ttf'
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
    <title>รายงานการเข้างาน | Logs IT NETWORK</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'Sarabun', sans-serif;
    }
</style>
</head>
<body>
 <div class="container">
 <div class="text-right mb-20">
 <div>
    <img src="../Asset/Img/logo.png" alt="" width="256" style="display: inline-block; vertical-align: middle;">
    <p class="font-semibold" style="display: inline-block; vertical-align: middle;">Invoice #123456</p>
</div>
<p>Date: 2023-10-31</p>
s
 <div class="w-1/2 mx-auto p-4">
        <div class="text-center">
        </div>

        <div class="mt-8">
            <h2 class="text-lg font-semibold">Bill To:</h2>
            <p>Customer Name</p>
            <p>123 Main Street</p>
            <p>City, State, Zip Code</p>
        </div>
        <table class="w-full mt-8 border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 p-2 bg-gray-100">Item</th>
                    <th class="border border-gray-300 p-2 bg-gray-100">Description</th>
                    <th class="border border-gray-300 p-2 bg-gray-100">Quantity</th>
                    <th class="border border-gray-300 p-2 bg-gray-100">Price</th>
                    <th class="border border-gray-300 p-2 bg-gray-100">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 p-2">1</td>
                    <td class="border border-gray-300 p-2">Product A</td>
                    <td class="border border-gray-300 p-2">2</td>
                    <td class="border border-gray-300 p-2">$50.00</td>
                    <td class="border border-gray-300 p-2">$100.00</td>
                </tr>
                <!-- Add more rows for additional items -->
            </tbody>
        </table>
        <div class="text-right mt-8">
            <p class="text-lg font-semibold">Total: $100.00</p>
        </div>
    </div>
<p align="right">ครูที่ปรึกษา : <i>Kong RuksiamStudio</i></p>
<?php
    $html=ob_get_contents();
    $mpdf->WriteHTML($html);
    $mpdf->Output("MyReport.pdf");
    ob_end_flush();
?>
<a href="MyReport.pdf" class="btn btn-primary">โหลดผลการเรียน (pdf)</a>
 </div>
</body>