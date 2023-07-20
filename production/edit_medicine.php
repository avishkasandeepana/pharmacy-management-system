<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: rgb(156, 131, 33);
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;

        }
    </style>

</head>

<body>
    <?php
    include 'conn.php';
    $id = $_GET['id'];
    $update = "SELECT * FROM medicine WHERE med_id = $id";
    $updatequery = mysqli_query($conn, $update);
    $result = mysqli_fetch_assoc($updatequery);


    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        echo $id;
        $company_name = $_POST['company_name'];
        $product_name = $_POST['product_name'];
        $strength = $_POST['strength'];
        $form = $_POST['form'];
        $trade_price = $_POST['trade_price'];
        $expire_date = $_POST['expire_date'];
        $side_effect = $_POST['side_effect'];

        $insertquery =  "UPDATE medicine SET company_name ='$company_name', product_name ='$product_name', strength ='$strength',form='$form',
      trade_price = '$trade_price',expire_date='$expire_date',side_effect='$side_effect' WHERE med_id = $id";
        $mysqliquery = mysqli_query($conn, $insertquery);
        if ($insertquery) {
    ?>
            <?php /* echo "update successfull" */ ?>
            <script>
                window.location.replace("manage_medicine.php");
            </script>

    <?php

        } else {
            echo 'Not Updated';
        }
    }  ?>
    <!-- cansel button redirect to the back page -->
    <?php
    if (isset($_POST['cancel'])) {
        echo '<script>window.location.href = "manage_medicine.php";</script>';
        exit; // Make sure to exit after the redirect
    }
    ?>
    <!-- code end -->
    <!-- close button redirect to back page -->
    <script>
        function redirectToAnotherPage() {
            window.location.href = "manage_medicine.php";
        }
    </script>
    <!--  -->



    <div style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; text-align: center; font-size: 30px; position: relative; top: 150px;">
        <a href="#" class="edit" data-toggle="modal" data-target="#editEmployeeModal" id="openEditModal"><!-- this is a link  --><i class="material-icons" data-toggle="tooltip" title="Update">&#xE254;</i></a>
    </div>

    <!-- Update Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Data</h4>
                        <button type="button" name="close" class="close" data-dismiss="modal" aria-hidden="true" onclick="redirectToAnotherPage()">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $result['product_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" value="<?php echo $result['company_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Strength</label>
                            <input type="text" name="strength" class="form-control" value="<?php echo $result['strength']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Form</label>
                            <input type="text" name="form" class="form-control" value="<?php echo $result['form']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Trade Price</label>
                            <input type="number" name="trade_price" id="trade_price" class="form-control" value="<?php echo $result['trade_price']; ?>" required>
                            <div id="trade_price_error" class="text-danger"></div>
                        </div>

                        <script>
                            var tradePriceInput = document.getElementById("trade_price");
                            var tradePriceError = document.getElementById("trade_price_error");

                            tradePriceInput.addEventListener("input", function() {
                                var tradePrice = parseFloat(tradePriceInput.value);

                                if (tradePrice < 0) {
                                    tradePriceError.textContent = "Trade price cannot be negative";
                                } else {
                                    tradePriceError.textContent = "";
                                }
                            });
                        </script>

                        <div class="form-group">
                            <label>Expire Date</label>
                            <input type="date" name="expire_date" class="form-control" value="<?php echo $result['expire_date']; ?>" required>
                        </div>


                        <div class="form-group">
                            <label>Side Effect </label>
                            <input type="text" name="side_effect" class="form-control" value="<?php echo $result['side_effect']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="cancel" class="btn btn-default" value="Cancel">
                        <input type="submit" name="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Automatically open the editEmployeeModal when the page loads
        $(document).ready(function() {
            $('#openEditModal').click();
        });
    </script>

</body>

</html>