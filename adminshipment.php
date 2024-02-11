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
        }
        .box1{
            height: 400px;
            width: 350px;
            margin-left: 100px;
            border: solid green 8px;
            border-top: none;
            border-left: none;
             background-color: rgba(345, 0, 0, 0.7);

           
        }
        .btn1
        {
            background-color: blue; 
            border: none;
            color: white;
            height: 35px;
            width: 170px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            cursor: pointer;
            margin-left: 17px;
        }
        .a11{
            height: 35px;
            width: 200px;
            border: none;
        }
       .b12{
        height: 35px;
            width: 200px;
            border: none;

        }
        .c13{
            height: 35px;
            width: 200px;
            border: none;
        }
        .d14{
            height: 35px;
            width: 200px;
            border: none;
        }
        .xyz{
            margin-left: 40px;
        }

    </style>
</head>

<body>

       
<div class="box1">
        <h1 style="color:white">Give The Details Here</h1>
        <h2> <hr style="color:green"></h2>
        <div class="xyz">
            <form method="post">
                <input type="text" name="Companyname" class="a11" placeholder="Company Name"><br><br>
                <input type="text" name="license_number" class="b12" placeholder="Ship License Number"><br><br>
                <input type="text" name="shipmenttime" class="d14" placeholder="Shipment Time"><br><br>
                <button type="submit" name="submit" class="btn1">Submit</button>
            </form>
        </div>
    </div>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'learn');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $Companyname = $_POST['Companyname'] ?? '';
        $license_number = $_POST['license_number'] ?? '';
        $shipmenttime = $_POST['shipmenttime'] ?? '';

        $sql = "INSERT INTO shipmenttime (Companyname, license_number, shipmenttime) 
                VALUES ('$Companyname', '$license_number', '$shipmenttime')";

        if (mysqli_query($conn, $sql) === TRUE) {
            echo "DATA INSERTED";
        } else {
            echo "Data not Inserted: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
   
</body>

</html>





