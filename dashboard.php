<?php
// Start PHP code
$variable = "Dashboard";

$totalVisitors = 883000;
 
$newVsReturningVisitorsDataPoints = array(
	array("y"=> 519960, "name"=> "Total Capital", "color"=> "#ffffff"),
	array("y"=> 363040, "name"=> "Total Revenue", "color"=> "#546BC1")
);
 
$newVisitorsDataPoints = array(
	array("x"=> 1420050600000 , "y"=> 33000),
	array("x"=> 1422729000000 , "y"=> 35960),
	array("x"=> 1425148200000 , "y"=> 42160),
	array("x"=> 1427826600000 , "y"=> 42240),
	array("x"=> 1430418600000 , "y"=> 43200),
	array("x"=> 1433097000000 , "y"=> 40600),
	array("x"=> 1435689000000 , "y"=> 42560),
	array("x"=> 1438367400000 , "y"=> 44280),
	array("x"=> 1441045800000 , "y"=> 44800),
	array("x"=> 1443637800000 , "y"=> 48720),
	array("x"=> 1446316200000 , "y"=> 50840),
	array("x"=> 1448908200000 , "y"=> 51600)
);
 
$returningVisitorsDataPoints = array(
	array("x"=> 1420050600000 , "y"=> 22000),
	array("x"=> 1422729000000 , "y"=> 26040),
	array("x"=> 1425148200000 , "y"=> 25840),
	array("x"=> 1427826600000 , "y"=> 23760),
	array("x"=> 1430418600000 , "y"=> 28800),
	array("x"=> 1433097000000 , "y"=> 29400),
	array("x"=> 1435689000000 , "y"=> 33440),
	array("x"=> 1438367400000 , "y"=> 37720),
	array("x"=> 1441045800000 , "y"=> 35200),
	array("x"=> 1443637800000 , "y"=> 35280),
	array("x"=> 1446316200000 , "y"=> 31160),
	array("x"=> 1448908200000 , "y"=> 34400)
);
 

include("config.php");
require_once 'functions.php';

$variable = "Hello, Your Name!";

$result = getBoothData();

$serviceDoc = getServiceData();

$dataPoints = array( 
	array("y" => 3373.64, "label" => "1" ),
	array("y" => 2435.94, "label" => "2" ),
	array("y" => 1842.55, "label" => "3" ),
	array("y" => 1828.55, "label" => "4" ),
	array("y" => 1039.99, "label" => "5" ),
	array("y" => 765.215, "label" => "6" ),
	array("y" => 612.453, "label" => "7" ),
);
for ($i = 8; $i <= 30; $i++) {
    $randomY = rand(500, 3500); // Generate a random value for "y" between 500 and 3500
    $dataPoint = array("y" => $randomY, "label" => strval($i));
    array_push($dataPoints, $dataPoint);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/Styles.css">
    <link rel="stylesheet" type="text/css" href="/css/dash.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,400&family=Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link rel="icon" href="OIP.png" type="image/png" sizes="64x64">
    <title>Wina Bwangu</title>

    <script>
window.onload = function() {
 //ForBar Chart
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
    backgroundColor: null,
	title:{
		text: "Tax obligations",
        fontSize: 20,
	},
	axisY: {
		title: "Amount (in kwanch)"
	},
	data: [{
        color: "#ff3550",
		type: "column",
		yValueFormatString: "#,##0.## kwacha",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

//forPIe chart
var totalVisitors = <?php echo $totalVisitors ?>;
var visitorsData = {
	"New vs Returning Visitors": [{
		click: visitorsChartDrilldownHandler,
		cursor: "pointer",
		explodeOnClick: false,
		innerRadius: "75%",
		legendMarkerType: "square",
		name: "New vs Returning Visitors",
		radius: "100%",
		showInLegend: true,
		startAngle: 90,
		type: "doughnut",
		dataPoints: <?php echo json_encode($newVsReturningVisitorsDataPoints, JSON_NUMERIC_CHECK); ?>
	}],
	"Total capital": [{
		color: "#ff3550",
		name: "Total capital",
		type: "column",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($newVisitorsDataPoints, JSON_NUMERIC_CHECK); ?>
	}],
	"Returning Visitors": [{
		color: "#546BC1",
		name: "Returning Visitors",
		type: "column",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($returningVisitorsDataPoints, JSON_NUMERIC_CHECK); ?>
	}]
};
 
var newVSReturningVisitorsOptions = {
    backgroundColor: null,

	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Total Revenue VS Total Capital"
	},
	legend: {
		fontFamily: "calibri",
		fontSize: 14,
		itemTextFormatter: function (e) {
			return e.dataPoint.name + ": " + Math.round(e.dataPoint.y / totalVisitors * 100) + "%";
		}
	},
	data: []
};
 
var visitorsDrilldownedChartOptions = {
	animationEnabled: true,
	theme: "light2",
	axisX: {
		labelFontColor: "#717171",
		lineColor: "#a2a2a2",
		tickColor: "#a2a2a2"
	},
	axisY: {
		gridThickness: 0,
		includeZero: false,
		labelFontColor: "#717171",
		lineColor: "#a2a2a2",
		tickColor: "#a2a2a2",
		lineThickness: 1
	},
	data: []
};
 
var barchart = new CanvasJS.Chart("barChartContainer", newVSReturningVisitorsOptions,);
barchart.options.data = visitorsData["New vs Returning Visitors"];
barchart.render();
 
function visitorsChartDrilldownHandler(e) {
	barchart = new CanvasJS.Chart("barChartContainer", visitorsDrilldownedChartOptions);
	barchart.options.data = visitorsData[e.dataPoint.name];
	barchart.options.title = { text: e.dataPoint.name }
	barchart.render();
	$("#backButton").toggleClass("invisible");
}
 
$("#backButton").click(function() { 
	$(this).toggleClass("invisible");
	barchart = new CanvasJS.Chart("barChartContainer", newVSReturningVisitorsOptions);
	barchart.options.data = visitorsData["New vs Returning Visitors"];
	barchart.render();
});
 
}
</script>
<style>
  #backButton {
	border-radius: 4px;
	padding: 8px;
	border: none;
	font-size: 16px;
	background-color: #2eacd1;
	color: white;
	position: absolute;
	top: 10px;
	right: 10px;
	cursor: pointer;
  }
  .invisible {
    display: none;
  }
</style>
</head>
<body>
    <div class="hero">
        <nav>
            <h2 class="fulllogo">Wina <span class="logo">Bwangu</span></h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="transaction.php">Transactions</a></li>
                <li><a class="active" href="dashboard.php">Dashboard</a></li>
            </ul>
            <h2>Contact</h2>
        </nav>
    </span>
        <h1 class="greeting"><?php echo $variable; ?></h1>
    </span>

    <div class="dashlist">
        <div class="focus">
            <div class="totalRevenue" style="color: #000000;">
                <p>Total Revenue</p>
                
                <?php
                    // Call the function to calculate the sum
                    calculateTransactionSum();
                ?><br>
                <strong>k850</strong>
                <p>total</p>

            </div>
        </div>

        <div class="boothdata">
        <div id="chartContainer" class="chartContainer"></div>
        
        </div>

    </div>

    <div class="dashlist">

        <div class="boothdata2">
            <?php 
                while($item = mysqli_fetch_assoc($serviceDoc)){
                    ?>

                    <p style="margin: 16px;"><?php echo $item['Service']?></p>

                <?php
                }
            ?>
            
        </div>

        <div class="section5">
        <div id="barChartContainer" style="height: 100%; width: 100%;"></div>
            
        </div>

        <div id="chart"></div>
    </div>
    
        

    <script src="https://cdn.canvasjs.com/canvasjs.min.js">
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30,40,35,50,49,60,70,91,125]
            }],
            xaxis: {
                categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
            }
        }


    </script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    
    <script src="/js/dashboard.js"></script>
</body>
</html>

<?php
// End PHP code
?>
