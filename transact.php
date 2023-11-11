<?php
// Start PHP code
include("config.php");
require_once 'functions.php';

$variable = "Hello, User!";

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

<?php

// Include the functions.php file
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $boothLocationMapping = array(
        'Wina1' => 'Lusaka CPD',
        'Wina2' => 'Libala',
        'Wina3' => 'Kabwata',
        'Wina4' => 'Mandevu',
        'Wina5' => 'Woodlands',
        'Wina6' => 'Matero East'
    );

    // Get the selected booth and look up its location
    $booth = isset($_POST['selectedBooth']) ? $_POST['selectedBooth'] : '';
    $location = isset($boothLocationMapping[$booth]) ? $boothLocationMapping[$booth] : '';



    $service = $_POST['selectedService'];
     // Assuming your 'services' table has columns 'service' and 'Revenue Per Kwanch'
     $sql = "SELECT `Revenue Per Kwanch` FROM services WHERE `service` = '$service'";
     $result = $conn->query($sql);
 
     if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();
         $revenuePerKwanch = $row['Revenue Per Kwanch'];
     } else {
         // Handle the case when the service is not found
         echo "Service '$service' not found in the 'services' table.";
     }
    $transactionAmount = $_POST['transactionAmount'];


    // Call the insertTransaction function from functions.php
    insertTransaction($booth, $location, $service, $revenuePerKwanch, $transactionAmount);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/Styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,400&family=Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link rel="icon" href="OIP.png" type="image/png" sizes="64x64">
    <title>Wina Bwangu</title>

    <script>
        window.onload = function() {
        
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
        
        }
    </script>

</head>
<body>
    
    <div class="hero">
        <nav>
        <span class="logo">Wina Bwangu</span>
            <ul>
                <li><a class="active" href="transact.php">Home</a></li>
                <li><a href="barExample.php">About</a></li>
                <li><a href="transaction.php">Transactions</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
            <h2>Contact</h2>
        </nav>
    </div>
    <h1 class="greeting"><?php echo $variable; ?></h1>
    <div class="formDiv">
        
            <div class="form">
            <form id="transaction-form" action="" method="post">
                <div class="selection">
                    <h3 class="add">Add Transaction</h3>
                    
                        <p>Select Booth</p>
                        <div class="bar">
                            <select name="selectedBooth" id="locationDropdown" onchange="populateServiceDropdown();" >
                                <option value="none"></option>
                                <?php 

                                    while($row = mysqli_fetch_assoc($result)){

                                ?>

                                    <option value="<?php echo $row['Booth'];?>"><?php echo $row['Booth'];?></option>

                                <?php
                                    }

                                ?>
                            </select>
                        </div>

                        <div class="bar">
                            <select name="selectedService" id="serviceDropdown" onchange="showServiceDetails();">
                                <!-- Service options will be populated here -->
                            </select>
                        </div>
                        <label for="amount">Transaction Amount:</label>
                        <input class="input" type="number" id="amount" name="transactionAmount" step="1" placeholder="Enter an amount" onchange="updateAAT()"><br>

                        
                    
                </div>
                
                <input type="submit" value="Submit">
            </form> 
            <div id="details" class="details">
                    <h2 id="dBooth">WB data</h2>
                    <h3 name="dLocation" id="dLocation"> WB data</h3>

                    <div id ="placeholder" class="placeholder">
                        <p>Available services</p>
                        <div class="image-container">
                            <img src="img/airtel.png" alt="airtel">
                            <img src="img/mtn.png" alt="mtn">
                            <img src="img/zamtel.png" alt="zamtel">
                            <img src="img/zanaco.jpg" alt="zanaco">
                            <img src="img/fnb.jpg" alt="fnb">
                        </div>
                    </div>                

                    <div id = "serviceDiv" class="serviceDiv">

                        <?php 
                            while($service = mysqli_fetch_assoc($serviceDoc)){
                                $revenue = $service['Revenue per Kwanch'];
                        ?>
                            <div class="serviceItem service<?php echo $service['ID'];?>" id="service<?php echo $service['ID'];?>">
                                <h4 id="dName"><?php echo $service['Service'];?></h4>
                                <p style='display:inline;' >Amount: </p>
                                <p style="display: inline; margin-left: 8px;" id= 'dAmount'>0</p><br>
                                <p style='display:inline;' id="dRPKP">Revenue Per Kwanch: </p>
                                <p style="display: inline; margin-left: 8px;" id="dRPK" name="revenuePerKwanch"><?php echo $revenue;?></p><br>
                                <p style='display:inline;'>Monthly Limit:</p>
                                <p style="display: inline; margin-left: 8px;" id="dLimit"><?php echo $service['Monthly Limit'];?></p>
                                <p id="dRemaining">Remaining</p>
                            </div>
                        <?php
                            }
                        ?>
                        
                        <div class="results">
                        <h2 id="aatText" class="aattext">Amount after tax:  </h2>
                        <span id="totalResult" class="totalResult">0</span>
                        </div>
                    </div>
                    
                </div>   
            </div>        
                    <!-- **************************************************************** -->
            

        <div class="charty">
        <div id="chartContainer" style="height: 370px; width: 600px;"></div>
        </div>
    </div>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <script src="script.js"></script>
</body>
</html>

<?php
// End PHP code
?>
