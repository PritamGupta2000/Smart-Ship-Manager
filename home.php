<!DOCTYPE html>
<html lang="en">
<head>
    <title > Easy Port</title>
    <link rel="stylesheet" href="cssFolder/index.css"> <style>

.xyz{
  background-image: url(cargo.jpg);
  background-size: cover;
}

</style>
</head>
<body>
    <div class="xyz">
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"style="color:#8C030E">Easy PORT</h2><hr>
            </div>

            <div class="menu">
                <!-- <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICE</a></li>
                    <li><a href="#">DESIGN</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul> -->
            </div>

            <!-- <div class="search">
                <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <button class="btn">Search</button></a>
            </div> -->

        </div> 
        <div class="content">
            <h1 style="color:#1F7334">Easy <br>Port <br>Management</h1>
            <p class="par">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt neque 
                 expedita atque eveniet <br> quis nesciunt. Quos nulla vero consequuntur, fugit nemo ad delectus 
                <br> a quae totam ipsa illum minus laudantium?</p>

                <!-- <button class="cn"><a href="#"> PORT Authority</a></button> -->
                <button class="button button2" onclick="window.location.href = 'authority.php';"> PORT AUTHORITY</button>


                <div class="form">

                    <form action ="home.php" method="post">

                         <h2>Login Here</h2>
                    
                          <input type="text" name="email" placeholder="Enter Email Here" required>
                          <input type="password" name="password" placeholder="Enter Password Here"required>
                          <input type="submit" name="submit" value="submit" class="btn solid">


                    </form>
                    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learn";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM signup WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) {
            header("location:dashboard.php?licensenumber=".$licensenumber);

        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close();
?>

                   

                       
                  

                    <p class="link">Don't have an account<br>


<style>
.button {
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 3px 1.5px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white;
  color: black;
  border: 2px solid #4CAF50;
}
.button2 {
  background-color: white;
  color: black;
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: whitesmoke;
}



</style>


<!-- <button class="button button1" action="signup.php">Sing Up</button> -->
<button class="button button1" onclick="window.location.href = 'signup.php';">Sign Up</button>


                    



                    <!-- <p class="liw">Log in with</p> -->

                    <div class="icons">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>


                    </div>

                </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script> -->
  
</body>
</html>