
<?php
$conn = mysqli_connect('localhost', 'root', '', 'learn');
if (isset($_POST['submit'])) {
    $companyname = $_POST['companyname'];
    $license_number = $_POST['license_number'];
    $number_of_ship = $_POST['number_of_ship'];
    $details = $_POST['details'];
    $dateandtime = $_POST['dateandtime'];
    $typesofgood = $_POST['typesofgood'];
    $whichcomgoodload = $_POST['whichcomgoodload'];
    $email = $_POST['email'];

    $sql = "INSERT INTO comdetails (companyname, email, dateandtime, typesofgood, license_number, number_of_ship, whichcomgoodload, details)
            VALUES ('$companyname', '$email', '$dateandtime', '$typesofgood', '$license_number', '$number_of_ship', '$whichcomgoodload', '$details')";

    if (mysqli_query($conn, $sql) === TRUE) {
        // Remove the "echo" line here
        mysqli_close($conn);
        header("location: show.php");
        exit; // Add this to stop further execution
    } else {
        echo "Data not Inserted: " . mysqli_error($conn);
    }
}
?>
<!-- Rest of your HTML code -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Company Details</title>
<style>
  /* Reset default margin and padding */
  body, h1, h2, h3, h4, h5, h6, p, input, textarea, button {
    margin: 0;
    padding: 0;
  }

  body {
    
    font-family: Arial, sans-serif;
    background-image: url('portproject2.jpg');
    background-size: cover;
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

  /* Container Styles */
  .container {
    max-width: 600px;
    margin: 100px auto;
    background-color: rgba(255, 255, 0, 0.8);           
    padding: 20px;
    border: solid green 8px;
    border-top: none;
    border-left: none;
  }

  /* Form Styles */
  form {
    display: flex;
    flex-direction: column;
  }

  label {
    color: white;
    margin-top: 10px;
  }

  input[type="text"],
  input[type="email"],
  textarea {
    padding: 8px;
    margin-bottom: 10px;
    border: none;
    border-radius: 4px;
  }

  textarea {
    height: 80px;
  }

  button[type="submit"] {
    background-color: #0056b3;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  button[type="submit"]:hover {
    background-color:blue ;
  }
</style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar">
    <a href="dashboard.php" class="navbar-brand">Port Management System</a>
    <ul class="navbar-links">
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="profile.php">Create Profile</a></li>
                <li><a href="show.php">Apply Status</a></li>
             <li> <a href="about.php" >ApplyFor Final Clearence</a></li>
              <li> <a href="status.php" >Accept status</a></li>
              <li> <a href="shipmenttime.php">Shipment time</a></li>
              <li> <a href="home.php">Logout</a></li>


      <!-- Add more navigation links as needed -->
    </ul>
  </nav>
  <h2 style="text-align: center; color: White;">Give The Details Here</h21>

  <!-- Form Container -->
  <div class="container">
    <!-- <h3 style="text-align: center; color: black;">Give The Details Here</h3> -->
  
    <hr>
    <form method="post">
      <!-- Your form fields here -->
      <h5 style="color:black;">Company Name</h5>
                <input type="text" name="companyname" class="a11" placeholder="Company Name">
                <h5 style="color:black;"> Company Email</h5>
                <input type="email" name="email" class="a11" placeholder="Company email"required>
                <h5  style="color:black;">Date and Time</h5>
                <input type="text" name="dateandtime" class="a11" placeholder="Give Starting Date and time">
                <h5 style="color:black;">Types of Good</h5>
                <input type="text" name="typesofgood" class="a11" placeholder="What types of good Load">
              


                <h5 style="color:black;">License Number</h5>
                <input type="text" name="license_number" class="a11" placeholder="ship License Number"required>
                <h5 style="color:black;">Number Of Ship</h5>
                <input type="text" name="number_of_ship" class="a11" placeholder="Number of Ship">
                <h5 style="color:black;">Which Company Good Load</h5>
                <input type="text" name="whichcomgoodload" class="a11" placeholder="Which Companies Goods You Load">
                <h5 style="color:black;">Details</h5>
                <textarea name="details" class="a11" placeholder="Other Details"></textarea>

      <button type="submit" name="submit" class="btn1">Submit</button>
    </form>
  </div>

    
</body>

</html>
