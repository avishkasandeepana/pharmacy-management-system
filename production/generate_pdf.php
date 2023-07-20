<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


ob_start(); // Start output buffering

// Include the necessary files
require_once('conn.php');

// Get the medicine data from the database
$query = 'SELECT * FROM medicine';
$result = mysqli_query($conn, $query);

// Start generating the PDF content
ob_clean(); // Clean the output buffer
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medicine List</title>
    <style>
        /* Define your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Medicine List</h1>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Company Name</th>
                <th>Strength</th>
                <th>Form</th>
                <th>Trade Price</th>
                <th>Expire Date</th>
                <th>Product Image</th>
                <th>Side Effect</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><?php echo $row['strength']; ?></td>
                    <td><?php echo $row['form']; ?></td>
                    <td><?php echo $row['trade_price']; ?></td>
                    <td><?php echo $row['expire_date']; ?></td>
                    <td><?php echo $row['product_image']; ?></td>
                    <td><?php echo $row['side_effect']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
<?php
$content = ob_get_clean(); // Get the generated PDF content
ob_end_clean(); // Clean the output buffer

// Set the appropriate headers for PDF download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="medicine_list.pdf"');

// Output the PDF content
echo $content;
exit;
?>
