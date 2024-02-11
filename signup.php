<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Signup Form</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

h2 {
    margin-bottom: 20px;
}

input {
    padding: 10px;
    margin-bottom: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

</style>


</head>
<body>
    <div class="container">
        <form action="signup.php" method="post">
            <h2>Sign Up</h2>
            <input type="text" name="Company" placeholder="Company" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>
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
    $Company = $_POST["Company"];
    $email = $_POST["email"];
    $password = ($_POST["password"] );

    $sql = "INSERT INTO signup (Company, email, password) VALUES ('$Company', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


    
</body>
</html>
