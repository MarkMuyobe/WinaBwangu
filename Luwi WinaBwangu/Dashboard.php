<?php
session_start();

include("connection.php");
include("functionsM.php");

$user_data = check_login($con);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="side_style.css">
    <title>Wina Bwangu Dashboard</title>
</head>
<body>
  <div class="header">
    <div class="wrapper">
        <div class="wrapper2">
            <div class="profit">
                <img src="images/monitoring.png" class="profit-img">
            </div>
            <div class="middle">
                <div class="left">
                    <h3>Total Revenue</h3>
                    <h1>K2,481,562</h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx="45" cy="45" r="36"></circle>
                    </svg>
                    <div class="number">
                        <p>81%</p>
                    </div>
                </div>
            </div>
            <small class="text-muted">For the Year 2021</small>
        </div>
        <div class="wrapper3">
            <div class="capital">
                <img src="images/equalizer.png" class="capital-img">
            </div>
            <div class="middle">
                <div class="left">
                    <h3>Total Capital</h3>
                    <h1>K1,500,000</h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx="45" cy="45" r="36"></circle>
                    </svg>
                    <div class="number">
                        <p>58%</p>
                    </div>
                </div>
            </div>
            <small class="text-muted">For the Year 2021</small>
        </div>
        
    </div>
    <div class="wrapper4">
        <div class="chart">
            <canvas id="barchart"></canvas>
        </div>
    </div>
    <div class="wrapper5">
        <div class="chart">
            <canvas id="doughnut"></canvas>
          </div>
    </div>
    <div class="wrapper6">
        <div class="right">
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Luwi</b></p>
                        <small class="text-muted">Admin</small>
                        <div class="profile-pic">
                            <img src="images/admin2.png" class = "profile">
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="wrapper7">
        <div class="recent-transactions">
            <h2>Recent Transactions</h2>
            <div class="updates">
                <div class="update">
                    <div class="pic">
                        <img src="images/withdraw.png">
                    </div>
                    <div class="message">
                        <p><b>Wina 2</b> +K305.75</p>
                        <small class="text-muted">3 hours ago</small>
                    </div>
                </div>
                <div class="update">
                    <div class="pic">
                        <img src="images/withdraw.png">
                    </div>
                    <div class="message">
                        <p><b>Wina 5</b> +K23.67</p>
                        <small class="text-muted">3 hours ago</small>
                    </div>
                </div>
                <div class="update">
                    <div class="pic">
                        <img src="images/withdraw.png">
                    </div>
                    <div class="message">
                        <p><b>Wina 3</b> +K110.38</p>
                        <small class="text-muted">3 hours ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper8">
        <div class="services">
            <h2>Services</h2>
            <div class="items">
                <div class="iconA">
                    <img src="images/credit-card3.png">
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Airtel Money</h3>
                        <small class="text-muted">Last 24 Hours</small>
                    </div>
                    <h5 class="success">+39%</h5>
                    <h3>K1094</h3>
                </div>
            </div>
            <div class="items">
                <div class="iconB">
                    <img src="images/credit-card2.png">
                </div>
                <div class="right">
                    <div class="info">
                        <h3>FNB</h3>
                        <small class="text-muted">Last 24 Hours</small>
                    </div>
                    <h5 class="danger">-17%</h5>
                    <h3>K-287</h3>
                </div>
            </div>
            <div class="items">
                <div class="iconC">
                    <img src="images/credit-card1.png">
                </div>
                <div class="right">
                    <div class="info">
                        <h3>MTN Money</h3>
                        <small class="text-muted">Last 24 Hours</small>
                    </div>
                    <h5 class="success">+20%</h5>
                    <h3>K752</h3>
                </div>
            </div>
            <div class="add-service">
                <img src="images/list-plus.png">
                <h3>Add Service</h3>
            </div>
        </div>
    </div>
    <div class="side_nav">
        <div class="user">
            <img src="images/logo.jpg" class="user-img">
            <div>
                <h2>Wina Bwangu</h2>
                <p>WinaBwangu.com</p>
            </div>
            <img src="images/star.png" class="star-img">
        </div>
        <ul>
            <li><img src="images/members.png"><p><a href="index.php">Home</p></li>
            <li><img src="images/bank2.png"><p>Booths</p></li>
            <li><img src="images/dashboard.png"><p>Totals</p></li>
            <li><img src="images/reports.png"><p>Records</p></li>
        </ul>
        <ul>
            <li><img src="images/logout.png"><p><a href="logout.php">Logout</p></li>
        </ul>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <script src="chart1.js"></script>
  <script src="chart2.js"></script>
</body>
</html>