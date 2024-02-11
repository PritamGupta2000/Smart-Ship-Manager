<?php
if (isset($_POST['accept'])) {
    $action = 'accept';
} elseif (isset($_POST['reject'])) {
    $action = 'reject';
} else {
    // Redirect back to the main page if no action is set
    header('Location: index.php');
    exit();
}

$id = $_POST[$action];
$licenseNumber = $_POST['license_number'];

// Perform database operations to update status or delete record based on $action and $id
// ...

// Redirect to submitpdf page with action, ID, and License Number as parameters
header("Location: submitpdf.php?action=$action&id=$id&license_number=$licenseNumber");
exit();
?>
