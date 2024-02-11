<!DOCTYPE html>
<html>
<head>
    <title>Apply Status</title>
    <style>
        body {
            background-image: url("portproject2.jpg");
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
/* Navigation Bar Styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 50px;
    background-color: rgba(0, 143, 140, 0.5);
    color: white;
    /* background-color: transparent; */
  }

  .navbar-brand {
    font-size: 24px;
    font-weight: bold;
    text-decoration: none;
    color: white;
  }

  .navbar-links {
   
    list-style: none;
    display: flex;
  }

  .navbar-links li {
    margin-right: 20px;
  }

  .navbar-links li:last-child {
    margin-right: 0;
  }

  .navbar-links a {
    
    text-decoration: none;
    color: white;
    transition: color 0.3s;
  }

  .navbar-links a:hover {
    color: blue;
    background-color: green;
     /* Change to your desired hover color */
  }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            background-color: rgba(255, 255, 0, 0.8);           
            color: bleck;
        }

        .table th,
        .table tr {
            font-weight: bold;
        }

        .btn1 {
            background-color: blue;
            border: none;
            color: white;
            height: 35px;
            width: 170px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            cursor: pointer;
            margin-left: 17px;
            transition: background-color 0.3s;
        }

        .btn1:hover {
            background-color: #459451;
        }
        
    </style>
</head>
<body>
     <!-- Navigation Bar -->
  <nav class="navbar">
    <a href="dashboard.php" class="navbar-brand">Port Management System</a>
    <ul class="navbar-links">
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="Companydetails.php">Apply</a></li>
                <li><a href="profile.php">Create Profile</a></li>
                <li><a href="show.php">Apply Status</a></li>
             <li> <a href="about.php" >ApplyFor Final Clearence</a></li>
              <li> <a href="status.php" >Accept status</a></li>
              <li> <a href="shipmenttime.php">Shipment time</a></li>
              <li> <a href="home.php">Logout</a></li>

      <!-- Add more navigation links as needed -->
    </ul>
  </nav>
<div class="container">
    <div class="nav">
    <h2 style="text-align:center;margin-top:10px;background-color:black;">Apply Status and Payment</h2><hr>
    </div>
    <table class="table table-bordered">
        <tr>
            <th style="background-color:black">ID</th>
            <th style="background-color:black">Company Name</th>
            <th style="background-color:black">License Number</th>
            <th style="background-color:black">Email</th>
            <th style="background-color:black">Types Of Goods</th>
            <th style="background-color:black">Which Commodity to Load</th>
            <th style="background-color:black">Date and Time</th>
            <th style="background-color:black">Status</th>
            <th style="background-color:black">Action</th>
        </tr>

        <?php


    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'learn';

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM comdetails";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['companyname'] . "</td>";
        echo "<td>" . $row['license_number'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['typesofgood'] . "</td>";
        echo "<td>" . $row['whichcomgoodload'] . "</td>";
        echo "<td>" . $row['dateandtime'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";

        if ($row['status'] === 'Accepted') {
           
            echo "<form action='sslcom.php' method='POST'><td><button class='btn1'>Pay Now</button></td></form>";
        } else {
            echo "<td></td>"; // Empty cell for rows with other statuses
        }

        echo "</tr>";
    }

    mysqli_close($conn);
  
?>
</div>
</body>
</html>

