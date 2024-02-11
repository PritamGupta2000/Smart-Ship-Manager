<!DOCTYPE html>
<html>
<head>
    <title>Final Clearance Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<style>
   body {
    background-image: url(portproject2.jpg);
    background-size: cover;
}

.box {
    height: 500px;
    width: 500px;
    background-color: rgba(255, 255, 0, 0.8);           
    margin-left:  320px;
    text-align: center;
    border: solid red 5px;
    border-top: none;
    border-left: none;
}

.table {
    background-color: transparent;
}

.table th,
.table td {
    background-color: transparent;
    font-weight: bold;
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

</style>

</head>
<body>
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
    <h1 style="color:white;text-align:center;background-color:black;margin-top:40px;">Final Clearance Requests</h1>
<div class="box">
    <?php
    $conn = new mysqli("localhost", "root", "", "learn");
    if ($conn->connect_error) {
        die("Connection Failed");
    }

    if (isset($_POST['final_clearance_request'])) {
        $licenseNumber = $_POST['license_number'];
        $Finalrequest = $_POST['Finalrequest'];

        // Insert data into finalrequest table
        $insertSql = "INSERT INTO finalrequest (license_number,Finalrequest ) VALUES ('$licenseNumber', '$Finalrequest')";

        if ($conn->query($insertSql) === TRUE) {
            echo "Request sent and stored successfully.";
        } else {
            echo "Error inserting data: " . $conn->error;
        }
    }

    $sql = "SELECT license_number, status FROM comdetails WHERE status = 'Accepted'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>License Number</th>";
        echo "<th>Status</th>";
        echo "<th>Operation</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["license_number"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
        
            echo "<td>";
            echo '<form action="about.php" method="post">';
            echo '<input type="hidden" name="license_number" value="' . $row["license_number"] . '">';
            echo '<input type="hidden" name="Finalrequest" value="Request for Final Clearance">';
            echo '<button type="submit" name="final_clearance_request" class="btn btn-primary">Final Clearance Request</button>';
            echo '</form>';
            echo "</td>";
        
            echo "</tr>";
        }
        


        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No accepted licenses found.</p>";
    }

    $conn->close();
    ?>
    </div>
</body>
</html>
