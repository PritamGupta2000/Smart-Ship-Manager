<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    body{
        background-image: url(portproject2.jpg);
        background-size: cover;
        /* filter: blur(8px);
        webkit-filter: blur(8px); */

        
        
    }
    .box{
        height: 500px;
        width: 750px;
        background-color: rgba(0, 140, 155, 0.8);

        margin-left:  320px;
        text-align: center;
        border: solid red 5px;
        border-top: none;
        border-left: none;
    }
    .hello{
        color: black;
    background-color: transparent;
    font-weight: bold;
}

    
    .print-button {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.print-button:hover {
    background-color: #45a049;
}
.accept-button {
    padding: 5px 10px;
    background-color: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.accept-button:hover {
    background-color: #218838;
}


</style>

<script>
    function printLicenseDetails(licenseNumber) {
        var printWindow = window.open('', '_blank');
        
        var content = "<h1>License Details: " + licenseNumber + "</h1>";
        content += "<p>Status: " + getStatus(licenseNumber) + "</p>";
        content += "<p>Final Request: " + getFinalRequest(licenseNumber) + "</p>"; 
        content += "<p>email : " + getFinalRequest(licenseNumber) + "</p>"; 

        // Display the new field
        // Add more details as needed
        
        printWindow.document.write(content);
        
        printWindow.print();
        printWindow.close();
    }

    function getStatus(licenseNumber) {
        return "Accepted";
    }

    function getFinalRequest(licenseNumber) {
        // Implement a function to fetch the final request based on license number
        // You can make an AJAX request to the server to get the request
        // For now, let's return a placeholder value
        return "Final Request Placeholder";
    }
</script>
</head>




</head>
<body>
<div class="box">

<?php
$conn = new mysqli("localhost", "root", "", "learn");
if ($conn->connect_error) {
    die("Connection Failed");
}

if (isset($_POST['send_final_clearance'])) {
    $licenseNumber = $_POST['license_number'];

    // Update the status in comdetails table
    $updateSql = "UPDATE comdetails SET status = 'Final Cleared' WHERE license_number = '$licenseNumber'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Final Clearance sent successfully for license number: " . $licenseNumber;
    } else {
        echo "Error updating data: " . $conn->error;
    }
}

if (isset($_POST['reject_clearance'])) {
    $licenseNumber = $_POST['license_number'];

    // Update the status in comdetails table
    $updateSql = "UPDATE comdetails SET status = 'Clearance Rejected' WHERE license_number = '$licenseNumber'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Clearance rejected successfully for license number: " . $licenseNumber;
    } else {
        echo "Error updating data: " . $conn->error;
    }
}

$sql = "SELECT comdetails.id, comdetails.license_number, comdetails.status, comdetails.email, finalrequest.Finalrequest 
FROM comdetails 
LEFT JOIN finalrequest ON comdetails.license_number = finalrequest.license_number 
WHERE comdetails.status = 'Accepted'";

$result = $conn->query($sql);
?>

<h1 style="text-align:center; color:white;"> Final Clearence Issues</h1>
<table border="1" class="hello">
    <tr>
    
    

        <th> ID</th>
        <th>License Number</th>
        <th>Request For Final Clearence</th>
        <th>email</th>
        <th>status</th>
        <th>Print</th>
        <th>Clearence Update</th>
        <th>Clearence Update</th>

    </tr>

    <?php
   


while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["license_number"] . "</td>";
    echo "<td>" . $row["Finalrequest"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["status"] . "</td>";
    echo "<td><button class='print-button' onclick=\"printLicenseDetails('" . $row["license_number"] . "')\">Print</button></td>";

    echo "<td>";
    echo "<a href='mail.php?action=accept&id=" . $row["license_number"] . "&email=" . $row["email"] . "' class='accept-button'>Final Clearance</a> ";
    echo "</td>";
    echo "<td>";
    echo "<a href='mail.php?action=reject&id=" . $row["license_number"] . "&email=" . $row["email"] . "' class='accept-button'>Reject Clearance</a>";
    echo "</td>";
    
    echo "</tr>";
}






$conn->close();


?>
    

</table>
</div>
</body>
</html>
