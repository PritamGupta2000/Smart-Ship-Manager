<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        /* ... your CSS styles ... */
    </style>
</head>
<body>
    <h1>Data from Database</h1>

    <?php
    $conn = new mysqli("localhost", "root", "", "learn");
    if ($conn->connect_error) {
        die("Connection Failed");
    }

    $sql = "SELECT companyname, license_number, details, id, number_of_ship, Email,whichcomgoodload,typesofgood,status,dateandtime FROM comdetails";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table >";
        echo "<tr>";
        echo "<th>Company Name</th>";
        echo "<th>License Number</th>";
        echo "<th>Details</th>";
        echo "<th>ID</th>";
        echo "<th>Number of Ship</th>";
        echo "<th>Email</th>";
        echo "<th>Date and Time</th>";
        echo "<th>Types of Good</th>";
        echo "<th>Which Companies Goods</th>";
        echo "<th>status</th>";
        echo "<th>Operation</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            $id=$row['id'];
            $email= $row["Email"] ;
            echo "<tr>";
            echo "<td>" . $row["companyname"] . "</td>";
            echo "<td>" . $row["license_number"] . "</td>";
            echo "<td>" . $row["details"] . "</td>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["number_of_ship"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["dateandtime"] . "</td>";
            echo "<td>" . $row["typesofgood"] . "</td>";
            echo "<td>" . $row["whichcomgoodload"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";

            echo "<td>";
            echo "<a href='submitpdf.php?action=accept&id=$id&email=$email' class='btn btn-success'>Accept</a> ";
            
            echo "<a href='submitpdf.php?action=reject&id=$id&email=$email' class='btn btn-danger'>Reject</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p class='no-data'>No data found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
