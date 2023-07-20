<?php
require 'conn.php';
// Retrieve the rowInfo array from the AJAX request
$rowInfo = $_POST['rowInfo'];

// Iterate over the rowInfo array and update the quantity in the database
foreach ($rowInfo as $row) {
    $itemId = $row['id'];
    $quantity = $row['quantity'];

    // Perform the update query
    $sql = "UPDATE medicine SET quantity = quantity - $quantity WHERE med_id = $itemId";

    if ($conn->query($sql) !== TRUE) {
        echo 'Error updating quantity: ' . $conn->error;
        exit;
    }
}

// Close the database connection
$conn->close();

// Send a success response
echo 'Quantity updated successfully.';
?>
