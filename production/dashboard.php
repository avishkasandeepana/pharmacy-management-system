<?php
session_start();

if (isset($_SESSION['soonExpiringMedicine']) && !empty($_SESSION['soonExpiringMedicine'])) {
    $soonExpiringMedicine = $_SESSION['soonExpiringMedicine'];

    // Loop through and display the data
    foreach ($soonExpiringMedicine as $value) {
        // Display medicine details here
    }
} else {
    // echo "No soon expiring medicine data available.";
}
?>





<?php require 'expire_medicine_cal.php'?>
<?php require 'index.php'; ?>
<?php require 'conn.php'; ?>
<?php if (isset($yourArray['product_name']) && isset($yourArray['form']) && isset($yourArray['expire_date'])) {
    // Access the array keys here
    $product_name = $yourArray['product_name'];
    $form = $yourArray['form'];
    $expire_date = $yourArray['expire_date'];

    // Continue with your code
} else {
    // Handle the case when the array keys are not defined
    echo "Some array keys are undefined.";
}
?>


<!-- getting expiresoon values -->

<!-- getting over -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- morris CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>


<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="right_col" role="main">
         <div class="row" style="display: inline-block;" >
         <!-- body start here -->


<!--
            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Dashboard</h3>

                </div>

                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Dashboard</li>

                    </ol>

                </div>

            </div>
-->
            <style>
                .batch-d{
                    margin-top: 10px;
                }
            </style>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 batch-d d-flex">
                        <div class="card card-inverse card-info d-flex" style="flex: 1 1 100%;">
                            <div class="card-body" style="position: relative;">
                              
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="fa fa-user float-right"></i></h1>
                                    </div>
                                    <div class="mr-auto">
                                        <h4 class="card-title">Regular <br /> Customers</h4>
                                    </div>
                                    <div class = "row">
                                        <div class="col-4 align-self-center">
                                    <h2 class="font-light text-white">
                                        <?php // Assuming you have already established a database connection

                                                // Query to get the count of rows in the table
                                                $query = "SELECT * FROM customer ";
                                                $result = mysqli_query($conn, $query);
                                                $rowcount=mysqli_num_rows($result);
                                               echo  $rowcount;  ?>
                                    </h2></div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 batch-d">
                        <div class="card card-inverse card-success">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="fa fa-medkit float-right"></i></h1></div>
                                    <div>
                                        <h4 class="card-title">TOTAL MEDICINE</h4>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white"><?php $mquery = "SELECT * FROM medicine";
                                                                                $mresult = mysqli_query($conn,$mquery);
                                                                                $mrowcount = mysqli_num_rows($mresult);
                                                                                echo $mrowcount; ?></h2> </div>
                                    <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:50px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 batch-d">
                        <div class="card card-inverse card-danger">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="fa fa-handshake-o float-right"></i></h1></div>
                                    <div>
                                        <h4 class="card-title">TOTAL SUPPLIER</h4>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white"><?php $squery = "SELECT * FROM supplier";
                                                                                $setquery = mysqli_query($conn,$squery);
                                                                                $sresult = mysqli_num_rows($setquery);
                                                                                echo $sresult; ?></h2> </div>
                                    <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:50px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 batch-d">
                        <div class="card card-inverse card-primary">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="fa fa-pencil-square-o float-right"></i></h1></div>
                                    <div>
                                        <h4 class="card-title">SALES TODAY</h4>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-black"><?php /*
                                               
                                              */  ?></h2> </div>
                                    <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:50px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <!-- Row -->

                <div class="row">

                    <!-- Column -->

                    

                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-success">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="add_medicine.php">Add Medicine</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-inverse">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="add_supplier.php">Add Supplier</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-primary">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="add_customer.php">Add Customer</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-info">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="pos.php">Point Of Sale</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-primary">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="expierd_medicine.php">Expierd medicine</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-success">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="manage_medicine.php">Manage medicine</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-inverse">

                                    <h5 class="text-white box m-b-0"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">



                                    <h5 class="text-muted m-b-0"><a href="manage_customer.php">Manage Customer</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->


                    <!-- Column -->

                </div>

                <div class="row">

                    <div class="col-lg-4">
                    <!-- Card -->

                    
                    </div>

                    <div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Soon Expiring Medicine List</h5>
            <div class="message-box">
                <div class="message-widget message-scroll">
                    <!-- Message -->
                    <?php
                    require 'conn.php';
                    // Set the date range
                    $startDate = date('Y-m-d');
                    $endDate = date('Y-m-d', strtotime('+2 month'));

                    // Perform the database query
                    $query = "SELECT * FROM medicine WHERE expire_date BETWEEN '$startDate' AND '$endDate'";
                    $result = mysqli_query($conn, $query);

                    // Process query result
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <a href="medicine_expire_soon.php">
                            <div class="mail-contnet">
                                <h6><?php echo $row['product_name']; ?></h6>
                                <span class="mail-desc"><?php echo $row['form']; ?></span>
                                <span class="time"><?php echo $row['expire_date']; ?></span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Expired Medicine List</h5>
            <div class="message-box">
                <div class="message-widget message-scroll">
                    <!-- Message -->
                    <?php
                    require 'conn.php';
                    $currentDate = date('Y-m-d');

                    $sql = "SELECT * FROM medicine WHERE expire_date < '$currentDate'";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <a href="expired_medicine.php">
                            <div class="mail-contnet">
                                <h6><?php echo $row['product_name']; ?></h6>
                                <span class="mail-desc"><?php echo $row['form']; ?></span>
                                <span class="time"><?php echo $row['expire_date']; ?></span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

                   
                </div>
            </div>

        </div>



         <!-- body ends here -->

        
        
        </div>

             <!-- footer start here always add footer in up to 2 div -->
             <?php  require 'footer.php'; ?>
        <!-- footer end here -->
      </div>
    </div>
</body>
</html>