<?php

// Include the functions.php file
include('functions.php');

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

    
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Check if the keys are set in the $_POST array before accessing them
//     $dLocation = isset($_POST['selectedBooth']) ? $_POST['selectedBooth'] : '';
//     $service = isset($_POST['selectedService']) ? $_POST['selectedService'] : '';
//     $revenuePerKwanch = isset($_POST['revenuePerKwanch']) ? $_POST['revenuePerKwanch'] : '';
//     $transactionAmount = isset($_POST['amount']) ? $_POST['amount'] : '';

//     // Now you can use these variables as needed

//     var_dump($dLocation, $service, $revenuePerKwanch, $transactionAmount);
    
//     // Rest of your processing code...

// }

    var_dump("Booth => '$booth',and... Location => '$location'");
    echo('<br>');
    var_dump("Service => '$service', RPK => '$revenuePerKwanch'");
    echo('<br>');
    var_dump("Transaction Amount => '$transactionAmount'");


    // Call the insertTransaction function from functions.php
    insertTransaction($booth, $location, $service, $revenuePerKwanch, $transactionAmount);
}


?>