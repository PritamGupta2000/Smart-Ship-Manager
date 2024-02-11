<?php
// Replace with your database connection details
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

// Fetch data from the database
$sql = "SELECT license_number, filename, folder_path,time_stamp FROM file";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>PDF Files</title>
    <!DOCTYPE html>
<html>
<head>
    <title>PDF Files</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            background-image: url(portproject2.jpg);
            background-size: cover;
        }
        h1 {
            text-align: center;
            padding: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: rgba(0, 143, 140, 0.5);
            /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); */
            background-color: rgba(255, 255, 255, 0.8);
        }
        th, td {
            padding: 10px 20px;
            text-align: left;
        }
        th {
            background-color: rgba(0, 143, 140, 0.5);

        }
        tr:nth-child(even) {

            background-color: rgba(0, 143, 140, 0.5);
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        </style>
</head>
<body>
    <h1 style="color:#ddd">Ship Documents</h1><hr>
    <table>
        <tr>
            <th>License Number</th>
            <th>File Name</th>
            <th>Date and time</th>
            <th>Download</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["license_number"] . "</td>";
                echo "<td>" . $row["filename"] . "</td>";
                echo "<td>" . $row["time_stamp"] . "</td>";
                echo "<td><a href='" . $row["folder_path"] . "' download>Download</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No files found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
