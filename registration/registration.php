<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include('connection.php');
include('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Something was posted
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nrc = $_POST['nrc'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phoneNo = $_POST['phoneNo'];
    $email = $_POST['email'];
    $client = $_POST['client'];
    $hobbies = $_POST['hobbies'];
    $houseNo = $_POST['houseNo'];
    $street = $_POST['street'];
    $area = $_POST['area'];
    $town = $_POST['town'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $name = $_POST['name'];
    $accNo = $_POST['accNo'];
    $branch = $_POST['branch'];
    $address = $_POST['address'];
    $bankPhoneNo = $_POST['bankPhoneNo'];
    $bankEmail = $_POST['bankEmail'];

    // Check if all required fields are not empty
    if (
        !empty($fname) && !empty($lname) && !empty($nrc) && !empty($gender) && !empty($dob) && !empty($phoneNo) &&
        !empty($email) && !empty($client) && !empty($hobbies) && !empty($houseNo) && !empty($street) && !empty($area) &&
        !empty($town) && !empty($province) && !empty($country) && !empty($username) && !empty($password) &&
        !empty($name) && !empty($accNo) && !empty($branch) && !empty($address) && !empty($bankPhoneNo) && !empty($bankEmail)
    ) {
        // Validate and sanitize user input (you should do more validation and sanitization)
        /*$fname = mysqli_real_escape_string($con, $fname);
        $lname = mysqli_real_escape_string($con, $lname);
        $nrc = mysqli_real_escape_string($con, $nrc);
        $gender = mysqli_real_escape_string($con, $gender);
        $dob = mysqli_real_escape_string($con, $dob);
        $phoneNo = mysqli_real_escape_string($con, $phoneNo);
        $email = mysqli_real_escape_string($con, $email);
        $client = mysqli_real_escape_string($con, $client);
        $hobbies = mysqli_real_escape_string($con, $hobbies);
        $houseNo = mysqli_real_escape_string($con, $houseNo);
        $street = mysqli_real_escape_string($con, $street);
        $area = mysqli_real_escape_string($con, $area);
        $town = mysqli_real_escape_string($con, $town);
        $province = mysqli_real_escape_string($con, $province);
        $country = mysqli_real_escape_string($con, $country);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);*/

        // You should also hash the password for security
        //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "insert into members (fname, lname, nrc, gender, DOB, phoneNo, email, client_type, hobbies, houseNo, street, area, town, province, country)
                  VALUES ('$fname', '$lname', '$nrc', '$gender', '$dob', '$phoneNo', '$email', '$client', '$hobbies', '$houseNo', '$street', '$area', '$town', '$province', '$country')";

        $result = mysqli_query($con, $query);

        if ($result) {
            // Insertion successful
            $authQuery = "insert into authentication (user_name, passwords) VALUES ('$username', '$password')";
            $authResult = mysqli_query($con, $authQuery);

            if ($authResult) {
                $user_id = mysqli_insert_id($con); // Get the last inserted user ID
                $insQueryId = "UPDATE members SET user_id = '$user_id' WHERE email = '$email'";
                
                if (mysqli_query($con, $insQueryId)) {
                    
                    $bankQuery = "INSERT INTO bankdetails (bank_name, accNo, branch, address, phoneNo, email, user_id)
                        VALUES ('$name', '$accNo', '$branch', '$address', '$bankPhoneNo', '$bankEmail', '$user_id')";

                    $bankResult = mysqli_query($con, $bankQuery);

                    if ($bankResult) {
                        // Insertion successful
                        header("Location: login.html");
                        die;
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }
                } else {
                    echo "Failed to enter bank details";
                }
            } else {
                echo "Failed to update user id";
            }
        } else {
            echo "Error: " . mysqli_error($con);
            echo "Failed to insert username and password";
        }
    } else {
        echo "Error: One or more fields are empty";
    }
} else {
    echo "Error: Failed to receive values from the registration form";
}
?>
