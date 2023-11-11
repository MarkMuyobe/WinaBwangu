<?php 

    require_once 'config.php';

    

    function getTransactionData (){
        global $conn;
        //Query to get everything from transactions table
        $query = "select * FROM transactions
        ORDER BY ID DESC";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function calculateTransactionSum() {
        global $conn;
        // Query to calculate the sum of 'Transaction Amount'
        $sql = "SELECT SUM(`Transaction Amount`) AS total_amount FROM Transactions";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output the sum of 'Transaction Amount'
            $row = $result->fetch_assoc();
            $totalAmount = $row['total_amount'];
            echo '<span id="totalResult" class="totalResult">K'.$totalAmount .'</span>';
        } else {
            echo "No transactions found.";
        }
    }

    function getBoothData(){
        global $conn;
        //Get the offerings table
        $query = "select * FROM offerings";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    //To get Data from service table to populate the long dash cube

    function getServiceData(){
        global $conn;
        $query = "select * FROM services";
        $result = mysqli_query($conn, $query);
        return $result;
    }



    function winaTotal($boothName){
        global $conn;
        $escapedBoothName = mysqli_real_escape_string($conn, $boothName); // Sanitize input to prevent SQL injection
        $query = "SELECT SUM(`Transaction Amount`) AS TotalAmount FROM transactions WHERE `Mobile Booth` = '$escapedBoothName'";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['TotalAmount'];
        } else {
            return 0; // Return 0 if there are no matching rows or an error occurred.
        }
    }


    function insertTransaction($booth, $location, $service, $revenuePerKwanch, $transactionAmount) {

        global $conn;

        // Get the current count of transactions
        $sqlCount = "SELECT COUNT(*) as count FROM transactions";
        $resultCount = $conn->query($sqlCount);
        $rowCount = $resultCount->fetch_assoc();
        $count = $rowCount['count'] + 1;

        // Format the transactionID
        $transactionID = "WB" . str_pad($count, 7, "0", STR_PAD_LEFT); // Ensures the number is 6 digits with leading zeros

        // SQL query to insert data into the database
        $sql = "INSERT INTO transactions (`Mobile booth`, `Location`, `Service`, `Revenue Per Kwanch`, `Transaction Amount`, `TransactionID`) 
        VALUES ('$booth', '$location', '$service', '$revenuePerKwanch', '$transactionAmount', '$transactionID')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully. TransactionID: " . $transactionID;
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    
    


    $winaTotal1 =winaTotal('Wina1');
    $winaTotal2 =winaTotal('Wina2');
    $winaTotal3 =winaTotal('Wina3');
    $winaTotal4 =winaTotal('Wina4');
    $winaTotal5 =winaTotal('Wina5');
    $winaTotal6 =winaTotal('Wina6');


    

?>