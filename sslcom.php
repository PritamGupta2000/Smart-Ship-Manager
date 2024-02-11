<!DOCTYPE html>
<?php ini_set('display_errors', 0); ?>
<?php 
    $licensenumber = null;
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  body{
    background-image: url(portproject2.jpg);
    background-size: cover;
  }
    .box{
        display: flex;
         margin-left: 155px; 
         /* margin-top: 50px; */

    }
    .box1{
        height: 500px;
        width: 300px;
        background-color: white;
        padding: 15px;
        margin-right: 45px;
    }
    .box2{
        height: 500px;
        width: 300px;
        background-color: white;
        padding: 15px;
        margin-left: 285px;

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

      <!-- Add more navigation links as needed -->
    </ul>
  </nav>
    <div class="box">
<div class="box1">
    <h3>Generate Bill</h3><hr>

    <!-- License Number: <input type="text" placeholder="Give the license Number"> -->
  
   
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vatRate = 0.15;    // VAT rate, you can adjust this
     $shippingCost = $_POST['shipping_cost'];
    $itemCost = $_POST["item_cost"];
    
    $vatAmount = $itemCost * $vatRate;
    $totalCost = $itemCost + $vatAmount + $shippingCost;
}
?>


    <h1>Generate Bill</h1>
    <form method="POST" action="">
        <label for="item_cost">Item Cost:</label>
        <input type="number" step="0.01" name="item_cost" required><br><br>
        
        <label for="shipping_cost">Shipping Cost:</label>
        <input type="number" step="0.01" name='shipping_cost' required><br><br>
        
        <label for="vat">Include VAT:</label>
        <input type="radio" name="vat" value="yes" required>Yes
        <input type="radio" name="vat" value="no" required>No<br><br>

        
        <input type="submit" value="Generate Bill">
    </form>
    
    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h2>Generated Bill:</h2>
        <p>Item Cost: $<?php echo $itemCost; ?></p>
        <p>Shipping Cost: $<?php echo $shippingCost; ?></p>
        <p>VAT Amount: $<?php echo $vatAmount; ?></p>
        <p>Total Cost: $<?php echo $totalCost; ?></p>
    <?php
     }
     ?>
</body>
</html>

<a href="payment.php?price=<?php echo $totalCost ?>">Go To Payment</a>

<body>



</body>
</html>

</div>
   

<div class="box2">
   
<div>
    <h3>Registered License Numbers</h3>
    <hr>

    <form action="" method="GET">
        <label for="searchLicense">Search License Number:</label>
        <input type="text" id="searchLicense" name="searchLicense" placeholder="Enter License Number">
        <button type="submit">Search</button>
    </form>
    <?php
// Step 1: Create a database connection
$conn = new mysqli("localhost", "root", "", "learn");

if ($conn->connect_error) {
    die("Connection Failed");
}

// Step 2: Retrieve data from the database
if (isset($_GET['searchLicense']) && !empty($_GET['searchLicense'])) {
    $searchLicense = $_GET['searchLicense'];

    $sql = "SELECT status FROM comdetails WHERE license_number = '$searchLicense'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $acceptedStatus = $row["status"] ? "Accepted" : "Rejected";
        echo "License Number: $searchLicense is $acceptedStatus";
    } else {
        echo "License Number: $searchLicense not found in records.";
    }
}

// Step 5: Close the database connection
$conn->close();
?>

   
</div>

  
</body>
</html>