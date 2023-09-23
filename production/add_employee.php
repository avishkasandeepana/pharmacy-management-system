<?php require 'sidebar.php'; ?>
<?php require 'head.php' ?>
<?php require 'conn.php'; ?>


<!-- file upload part -->
<?php
if (isset($_POST['submit'])) {

    $name = $_POST['employee_name'];
    $pnumber = $_POST['phone_number'];
    $email = $_POST['email'];
    $role = $_POST['em_role'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $address = $_POST['address'];

    $query = "INSERT INTO user SET
    
                em_name ='$name',
                em_contact = '$pnumber',
                em_email = '$email',
                em_role = '$role',
                em_password	= '$password',
                em_address = '$address'";

                $runquery = mysqli_query($conn,$query);


                if($runquery){
                    echo "query sucessfull";
                }else{
                    echo "query failed";
                }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add employee</title>

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

                                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="manage_medicine.php" class="text-white"><i class="" aria-hidden="true"></i> Manage Employee </a></button>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="card card-outline-info">
                                            <div class="card-header">
                                                <h4 class="m-b-0 text-blue">Add Employee <span class="pull-right"><?php date_default_timezone_set("Asia/Colombo");
                                                                                                                    echo date("l jS \of F Y h:i:s A") ?></span></h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="form-horizontal" id="formid" enctype="multipart/form-data" accept-charset="utf-8">

                                                    <div class="form-body">

                                                        <span class="m-t-30 m-b-40"></span>

                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">

                                                                <div class="form-group row">

                                                                    <label class="control-label text-right col-md-3 col-sm-12">Employee Name</label>

                                                                    <div class="col-md-9 col-sm-12">
                                                                        <input type="text" name="employee_name" class="form-control product_name" placeholder="Employee Name" required>

                                                                        <!--<select class="js-supplier-data-ajax form-control supplier" name="supplier" style="width:100%">
                                                                                                                                                                                                   <label class="control-label text-right col-md-3 col-sm-12">Phone Number</label>

                                                                        <input type="hidden" class="form-control supplier" name="supplier"  id="supplier" autocomplete="off">  -->
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-3 col-sm-12">Phone Number</label>
                                                                    <div class="col-md-9 col-sm-12">
                                                                        <input type="text" name="phone_number" class="form-control product_name" placeholder="Phone Number" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-3 col-sm-12">Email</label>
                                                                    <div class="col-md-9 col-sm-12">
                                                                        <input type="text" name="email" class="form-control strength" placeholder="Email" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-right col-md-3 col-sm-12">Emploee Roll</label>
                                                                    <div class="col-md-9 col-sm-12">
                                                                        <select name="em_role" class="select2 formSelect"  style="width:100%" required>
                                                                            <option value="admin">Admin</option>
                                                                            <option value="salesman">Salesman</option>
                                                                            <option value="manager">Manager</option>
                                                                        </select>
                                                                    </div>

                                                                </div>

                                                            </div>


                                                            <div class="col-md-6 col-sm-12">

                                                                <div class="form-group row">

                                                                    <label class="control-label text-right col-md-3 col-sm-12">Password</label>

                                                                    <div class="col-md-9 col-sm-12">

                                                                        <input type="text" name="password" class="form-control trade_price" placeholder="password" required>

                                                                    </div>

                                                                </div>

                                                            </div>


                                                            
                                                           
                                                            



                                                            <div class="col-md-6 col-sm-12">

                                                                <div class="form-group row">

                                                                    <label class="control-label text-right col-md-3 col-sm-12">Address</Address></label>

                                                                    <div class="col-md-9 col-sm-12">

                                                                        <input type="text" name="address" class="form-control totalQuantity Quantity" placeholder="Address">

                                                                    </div>

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

          
                <?php
                // Close the database connection
                mysqli_close($conn);

                ?>
                <!-- footer start here always add footer in up to 2 div -->
                <?php require 'footer.php'; ?>
                <!-- footer end here -->
            </div>
        </div>

    </body>

</html>