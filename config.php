<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "winadb";

// $conn = new mysqli($servername, $username, $password, $database);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


///////////////////////////////////////////////////
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "winadb";

// // Create connection
// $conn = new mysqli($servername, $username, $password);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Check if the database exists
// if (!$conn->select_db($database)) {
//     // Database does not exist, so create it using the SQL file
//     $sqlFile = 'db/winadb.sql';
//     $sql = file_get_contents($sqlFile);

//     // Execute each query in the file
//     $queries = explode(';', $sql);
//     foreach ($queries as $query) {
//         if (!empty($query)) {
//             $conn->query($query);
//         }
//     }

//     echo "Database created successfully!";
// }

//////////////////////////////////////////
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

// Function to check and create the database
function createDatabase($conn, $database) {
    // Check if the database exists
    if (!$conn->query("CREATE DATABASE IF NOT EXISTS $database")) {
        die("Error creating database: " . $conn->error);
    }

    // Select the database
    if (!$conn->select_db($database)) {
        die("Error selecting database: " . $conn->error);
    }

    // Check if the database was just created
    $databaseCreated = $conn->affected_rows > 0;

    if ($databaseCreated) {
        // Get the content of the SQL file
        $sqlFile = 'db/winadb.sql';
        $sql = file_get_contents($sqlFile);

        // Execute the queries using mysqli_multi_query
        if (!$conn->multi_query($sql)) {
            die("Error executing queries: " . $conn->error);
        }

        echo "Database created successfully!";
    }
}

// Call the function
createDatabase($conn, $database);

// Close the connection
//$conn->close();
?>

