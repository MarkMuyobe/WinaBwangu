<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "winadb";

// $conn = new mysqli($servername, $username, $password, $database);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


$servername = "localhost";
$username = "root";
$password = "";
$database = "winadb";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to create the database
function createDatabase($conn, $database) {
    // Check if the database exists
    if (!$conn->query("CREATE DATABASE IF NOT EXISTS $database")) {
        die("Error creating database: " . $conn->error);
    }

    // Select the database
    if (!$conn->select_db($database)) {
        die("Error selecting database: " . $conn->error);
    }

    // Get the content of the SQL file
    $sqlFile = 'db/winadb.sql';
    $sql = file_get_contents($sqlFile);

    // Execute the queries using mysqli_multi_query
    if (!$conn->multi_query($sql)) {
        die("Error executing queries: " . $conn->error);
    }

    echo "Database created successfully!";
}

// Check if the database exists
$result = $conn->query("SHOW DATABASES LIKE '$database'");
if ($result->num_rows == 0) {
    createDatabase($conn, $database);

   
}
 // Reconnect after creating the database
 $conn = new mysqli($servername, $username, $password, $database);

// Now, $conn should be connected to the 'winadb' database
?>
