<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url(portproject2.jpg);
            background-size: cover;
        }

        .container {
            background-color: rgba(255, 255, 0, 0.8);           
            padding: 20px;
            width: 80%;
            max-width: 800px;
            margin-top:100px;
            margin-left: 300px;
        }

        h1 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
        border: 1px solid #ddd;     
        background-color: transparent;
        font-weight: bold;
}
        

        th, td {
            padding: 10px;
            text-align: left;
        }

        .no-data {
            color: red;
            text-align: center;
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
    <h1 style="background-color:black;color:white;">Registered Shipment Time</h1>
    <div class="container">
    <?php
    

    // Step 1: Create a database connection
    $conn = new mysqli("localhost", "root", "", "learn");

    if ($conn->connect_error) {
        die("Connection Failed");
    }

    // Step 2: Retrieve data from the database
    $sql = "SELECT id, Companyname, license_number,  shipmenttime FROM shipmenttime";
    $result = $conn->query($sql);

    // Step 3: Check if there is any data




    
    
    if ($result->num_rows > 0) {

        echo "<table >";
        echo "<tr>";
        echo "<th> Id</th>";
        echo "<th>Company Name</th>";
        echo "<th>License Number</th>";
        echo "<th>Shipment Time</th>";
       

        echo "</tr>";

        // Step 4: Loop through the data and display it in the table
        while ($row = $result->fetch_assoc()) {
            
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["Companyname"] . "</td>";
            echo "<td>" . $row["license_number"] . "</td>";
            echo "<td>" . $row["shipmenttime"] . "</td>";

            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No data found.";
    }

    // Step 5: Close the database connection
    $conn->close();
    ?>
    </div>
</body>
</html>
