<?php
$conn = mysqli_connect('localhost', 'root', '', 'learn');
$id = $_GET['id'];

$sql = "UPDATE comdetails SET status = 'Accepted' WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header("Location: display_comdetails.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
