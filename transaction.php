<?php 

require_once 'config.php';
require_once 'functions.php';

$result = getTransactionData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,400&family=Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link rel="icon" href="OIP.png" type="image/png" sizes="64x64">
    <link rel="stylesheet" href="/css/transaction.css">
    <title>Transactions</title>
</head>
<body>
    <div class="hero">
        <nav>
            <h2 class="fulllogo">Wina <span class="logo">Bwangu</span></h2>
            <ul>
                <li><a href="transact.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a class="active" href="transaction.php">Transactions</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
            <h2>Contact</h2>
        </nav>
    </div>
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Transactions</h2>
                    </div>

                    <p>Airtel total</p>
                    <p>MTN Money total</p>
                    <p>Zamtel Money total</p>
                    <p>Zanaco</p>
                    <p>FFNB</p>
                    

                    <div class="card-body">
                        <table class="table">
                            <tr class="header">
                                <td>ID</td>
                                <td>Transaction ID</td>
                                <td>Mobile Booth</td>
                                <td>Location</td>
                                <td>Service</td>
                                <td>Revenue per Kwacha</td>
                                <td>Transaction Amount</td>
                                <td>Delete</td>
                            </tr>
                                <?php 

                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                            <tr id="row_<?php echo $row['ID']; ?>">
                            
                                <td><span id="ID_<?php echo $row['ID']; ?>"><?php echo $row['ID']; ?></span><input type="text" id="ID_input_<?php echo $row['ID']; ?>" style="display:none;"></td>
                                <td><span id="TransactionID_<?php echo $row['ID']; ?>"><?php echo $row['TransactionID']; ?></span><input type="text" id="TransactionID_input_<?php echo $row['ID']; ?>" style="display:none;"></td>
           

                                <td> <?php echo $row['Mobile Booth']; ?> </td>
                                <td> <?php echo $row['Location']; ?> </td>
                                <td> <?php echo $row['Service']; ?> </td>
                                <td> <?php echo $row['Revenue Per Kwanch']; ?> </td>
                                <td> <?php echo $row['Transaction Amount']; ?> </td>
                                <td><a href="#" class="btn btn-danger" onclick="deleteRecord(
                                    <?php echo $row['ID']; ?>);hideRow(this);">Delete</a></td>
                            </tr>
                                <?php
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/transaction.js"></script>
</body>
</html>