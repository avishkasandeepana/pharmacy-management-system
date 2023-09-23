<?php require 'sidebar.php'; ?>
<?php require 'head.php' ?>
<?php require 'conn.php';
if (isset($_POST['submit'])) {


    $company_name = $_POST['supplier_name'];
    $product_name = $_POST['product_name'];
    $strength = $_POST['strength'];
    $form = $_POST['formSelect'];
    $trade_price = $_POST['trade_price'];
    $box_price = $_POST['box_price'];
    $expire_date = $_POST['expire_date'];
    $Quantity = $_POST['Quantity'];
    $side_effect = $_POST['side_effect'];
    


    $sql = "INSERT INTO medicine  SET 

        company_name = '$company_name',
        product_name = '$product_name',
        strength = '$strength',
        form = '$form',
        trade_price = '$trade_price',
        box_price = '$box_price',
        expire_date = '$expire_date',
        quantity = '$Quantity',
        side_effect = '$side_effect'
        
        ";


    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        echo "quiry successfull";
    } else {
        echo "there was an error";
    }
}
$file_uploaded = false;
?>
<?php
if (isset($_POST['upload'])) {
    // image adding to the folder
    $file_name = $_FILES['image']['name'];
    $file_type = $_FILES['image']['type'];
    $file_size = $_FILES['image']['size'];
    $temp_name = $_FILES['image']['tmp_name'];

    $upload_to = 'images/product_img/'; // this is a image upload folder

    $file_uploaded = move_uploaded_file($temp_name, $upload_to . $file_name);
}

// image adding over


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="right_col" role="main">
                    <div class="row" style="display: inline-block;">
                        <!-- body start hear -->
                        <div class="page-wrapper">

                            <div class="container-fluid p-t-10">

                                <div class="flashmessage"></div>

                                <div class="row m-b-10">

                                    <div class="col-12">

                                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="manage_medicine.php" class="text-white"><i class="" aria-hidden="true"></i> Manage Medicine </a></button>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="card card-outline-info">
                                            <div class="card-header">
                                                <h4 class="m-b-0 text-blue">New Medicine <span class="pull-right"><?php date_default_timezone_set("Asia/Colombo");
                                                                                                                    echo date("l jS \of F Y h:i:s A") ?></span></h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-horizontal" id="formid" enctype="multipart/form-data" accept-charset="utf-8">

                                                    <div class="form-body">

                                                        <span class="m-t-30 m-b-40"></span>

                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">

                                                                <div class="form-group row">

                                                                    <label class="control-label text-right col-md-3 col-sm-12">Company Name</label>

                                                                    <div class="col-md-9 col-sm-12">
                                                                        <!--<select class="js-supplier-data-ajax form-control supplier" name="supplier" style="width:100%">
                                                           <?php foreach ($supplierList as $value) : ?>
                                                            <option value="<?php echo $value->s_id; ?>"><?php echo $value->s_name; ?></option>
                                                            <?php endforeach; ?>        
                                                        </select>-->
                                                                        <input type="text" class="form-control supplier_name" name="supplier_name" placeholder="Supplier Name..." id="supplier_name" autocomplete="off">
                                                                        <!-- <input type="hidden" class="form-control supplier" name="supplier"  id="supplier" autocomplete="off">  -->
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-3 col-sm-12">Product Name</label>
                                                                    <div class="col-md-9 col-sm-12">
                                                                        <input type="text" name="product_name" class="form-control product_name" placeholder="product name" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-3 col-sm-12">Strength</label>
                                                                    <div class="col-md-9 col-sm-12">
                                                                        <input type="text" name="strength" class="form-control strength" placeholder="Strength" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-3 col-sm-12">Form</label>
                                                                    <div class="col-md-9 col-sm-12">
                                                                        <select name="formSelect" class="select2 formSelect" id="" style="width:100%" required>

                                                                            <?php

                                                                            $query = "SELECT * FROM medi_category";

                                                                            $runquery = mysqli_query($conn, $query);
                                                                            if ($runquery) {
                                                                                while ($row = mysqli_fetch_assoc($runquery)) {
                                                                                    echo "<option value='" . $row['id'] . "'>" . $row['category_name'] . "</option>";
                                                                                }
                                                                            } else {
                                                                                echo "Query execution failed: " . mysqli_error($conn);
                                                                            }



                                                                            ?>

                                                                        </select>

                                                                    </div>

                                                                </div>

                                                            </div>


                                                            <div class="col-md-6 col-sm-12">

                                                                <div class="form-group row">

                                                                    <label class="control-label text-right col-md-3 col-sm-12">Trade Price</label>

                                                                    <div class="col-md-9 col-sm-12">

                                                                        <input type="number" name="trade_price" class="form-control trade_price" placeholder="Trade Price" required>

                                                                    </div>

                                                                </div>

                                                            </div>


                                                            <div class="col-md-6 col-sm-12">

                                                                <div class="form-group row">

                                                                    <label class="control-label text-right col-md-3 col-sm-12">Box Pirce</label>

                                                                    <div class="col-md-9 col-sm-12">

                                                                        <input type="number" name="box_price" class="form-control totalboxprice box_price" placeholder="Box Pirce">

                                                                    </div>

                                                                </div>
                                                            </div>




                                                            <div class="col-md-6 col-sm-12">

                                                                <div class="form-group row">

                                                                    <label class="control-label text-right col-md-3 col-sm-12">Quantity</label>

                                                                    <div class="col-md-9 col-sm-12">

                                                                        <input type="number" name="Quantity" class="form-control totalQuantity Quantity" placeholder="Quantity">

                                                                    </div>

                                                                </div>



                                                            </div>
                                                            <div class="col-md-6 col-sm-12">

                                                                <div class="form-group row">

                                                                    <label class="control-label text-right col-md-3 col-sm-12">Expire Date</label>

                                                                    <div class="col-md-9 col-sm-12">

                                                                        <input type="date" name="expire_date" class="form-control expire_date" placeholder="Expire Date" id="datepicker" required>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-3 col-sm-12">Side Effect</label>
                                                                    <div class="col-md-9 col-sm-12">
                                                                        <textarea class="form-control side_effect" name="side_effect" rows="1"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2">
                                                                <div class="file_prev " id="file_prev"></div>
                                                                <!--this is a file preview div-->
                                                                <?php
                                                                // Assuming the file was uploaded successfully

                                                                if (isset($_POST['upload'])) {
                                                                    if ($file_uploaded) {
                                                                        $preview_width = 220;
                                                                        $preview_height = 180;

                                                                        echo '<img src="' . $upload_to . $file_name . '" width="' . $preview_width . '" height="' . $preview_height . '">';
                                                                    }
                                                                }
                                                                ?>

                                                            </div>


                                                        </div>


                                                        <!--/row-->

                                                    </div>

                                                    <hr>

                                                    <div class="form-actions text-center">

                                                        <div class="row">

                                                            <div class=" col-md-12 ">

                                                                <div class="form-group">
                                                                    <button type="submit" name="submit" class="btn btn-info">Submit</button>

                                                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                                                </div>

                                                                <br>
                                                                <br>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>





                        <!-- bosy ends here -->
                    </div>
                </div>

                // Close the database connection
                <?php

                mysqli_close($conn);

                ?>
                <!-- footer start here always add footer in up to 2 div -->
                <?php require 'footer.php'; ?>
                <!-- footer end here -->
            </div>
        </div>

    </body>

</html>