<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url(portproject2.jpg);
    background-size: cover;
  }
  
  .profile-container {
    
    max-width: 400px;
    background-color: rgba(0, 140, 155, 0.8);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .profile-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 10px;
    object-fit: cover;
  }

  .profile-name {
    font-size: 24px;
    margin-bottom: 5px;
    color: #333;
  }

  .profile-details {
    font-size: 16px;
    margin-bottom: 20px;
    color: #666;
  }

  .button-container {
    display: flex;
    justify-content: space-between;
  }

  .button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .button:hover {
    background-color: #0056b3;
  }
  
  .upload-button,
  .change-image-button {
    display: block;
    margin-top: 10px;
    background-color: #ddd;
    color: #333;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .upload-button:hover,
  .change-image-button:hover {
    background-color: #ccc;
  }
  

  

  /* Navigation Bar Styles */
  .navbar {
   
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 50px;
  background-color: rgba(0, 143, 140, 0.5);
  color: white;
}

/* Rest of your existing styles... */

    /* background-color: transparent; */
  

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
                <li><a href="profile.php">Create Profile</a></li>
                <li><a href="show.php">Apply Status</a></li>
             <li> <a href="about.php" >ApplyFor Final Clearence</a></li>
              <li> <a href="status.php" >Accept status</a></li>
              <li> <a href="shipmenttime.php">Shipment time</a></li>

      <!-- Add more navigation links as needed -->
    </ul>
  </nav>


 
  <div class="profile-container">
  <h1>Create Your Profile</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <label for="profileImage">Profile Image:</label>
    <input type="file" id="profileImage" name="profileImage" accept="image/*">
    
    <label for="companyName">Company Name:</label>
    <input type="text" id="companyName" name="companyName" required>
    
    <label for="companyDetails">Company Details:</label>
    <textarea id="companyDetails" name="companyDetails" required></textarea>
    
    <button type="submit" name="createProfile">Create Profile</button>
  </form>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["createProfile"])) {
    $companyName = $_POST["companyName"];
    $companyDetails = $_POST["companyDetails"];

    // Handle image upload
    $targetDir = __DIR__ . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true); // Create directory with full permissions (not recommended for production)
}

$targetFile = $targetDir . basename($_FILES["profileImage"]["name"]);


    $sql = "INSERT INTO company_profiles (company_name, company_details, profile_image_url)
            VALUES ('$companyName', '$companyDetails', '$targetFile')";

    if ($conn->query($sql) === TRUE) {
        echo "Profile created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch and display profiles
$sql = "SELECT * FROM company_profiles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="profile-container">';
        echo '<img class="profile-image" src="' . $row["profile_image_url"] . '" alt="Profile Photo">';
        echo '<div class="profile-name">' . $row["company_name"] . '</div>';
        echo '<div class="profile-details">' . $row["company_details"] . '</div>';
        echo '</div>';
    }
}

$conn->close();
?>

</body>
</html>

