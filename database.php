<?php
include("config.php"); // Include the database configuration

// Example data to insert
$transactionID = "WB00000340";
$mobile_booth = "Test Wina";
$location = "Mandevu";
$service = "Airtel Money";
$revenue_per_kwanch = 0.88;
$transaction_amount = 444;

// SQL statement to insert data into the 'Transactions' table
$sql = "INSERT INTO transactions (TransactionID, `Mobile Booth`, Location, Service, `Revenue Per Kwanch`, `Transaction Amount`)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssdd", $transactionID, $mobile_booth, $location, $service, $revenue_per_kwanch, $transaction_amount);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();


// Close the connection
$conn->close();
?>
