<?php
// Include your database connection code here
require_once 'config.php';

if (isset($_POST['recordId'])) {
    $recordId = $_POST['recordId'];

    // Perform the SQL query to delete the record from the database
    $sql = "DELETE FROM transactions WHERE ID = " . $recordId;
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request.";
}
?>
