
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

<?php 


require_once '../DB/db.php';
include '../Asset/Header.php';
include '../Asset/SideNav.php';



?>
<div class="p-4 sm:ml-64 mt-20">
    
<canvas id="goodCanvas1" width="400" height="100" aria-label="Hello ARIA World" role="img"></canvas>

 

</div>

<?php

$query1 = $db->query('SELECT * FROM mains WHERE LOGS_TECHNICIANS = "นายเอกชัย สิมมาหลวง"');
$sum1 = mysqli_num_rows($query1);


$dataPoints = array(
    array("label" => "กันยายน 2023", "y" => ),
    array("label" => "ตุลาคม 2023", "y" => ),
    array("label" => "พฤศจิกายน 2023", "y" => ),
    array("label" => "ธันวาคม 2023", "y" => ),
    array("label" => "มกราคม 2024", "y" => ),
);

$dataPointsJSON = json_encode($dataPoints);
?>

<script>
var ctx = document.getElementById('goodCanvas1').getContext('2d');
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo $dataPointsJSON; ?>.map(dataPoint => dataPoint.label),
        datasets: [{
            label: 'My Line Chart',
            data: <?php echo $dataPointsJSON; ?>.map(dataPoint => dataPoint.y),
            borderColor: 'rgb(75, 192, 192)',
            borderWidth: 2,
            fill: false
        }]
    },
    options: {
        scales: {
            x: {
                type: 'category',
                labels: <?php echo $dataPointsJSON; ?>.map(dataPoint => dataPoint.label)
            },
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
