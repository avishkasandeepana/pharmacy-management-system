<?php require 'sidebar.php'; ?>
<?php require 'validate.php' ?>
<!-- random number for the customer -->
<?php $customerId =  time() . mt_rand(100, 999);
$customerId = 'C' . substr($customerId, -7);
// echo $customerId; 
?>
<!-- random number ends  -->
<?php     $cname  = $cphone = $cemail = $caddress =  $cus_t_amount =  $cus_r_discount =   $cnote = "";
$cnameERR = $cphoneERR = $cemailERR = $caddressERR =  $cus_t_amountERR =  $cus_r_discountERR =   $cnoteERR = "";
?>
<?php require 'conn.php';



if (isset($_POST['submit'])) {
// validation 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // customer name vlidation
        if (empty($_POST['cname'])){
            $cnameERR ="requierd field";
        }else if (strlen($_POST['cname'])>75){
            $cnameERR ="max length is 75 characters";
        }else{
            // parsing input data to the variable 
            $cname = test_input($_POST['cname']);
            if (preg_match("/^[a-zA-Z-' ]*$/", $cname)){
                $cnameERR =  "only letters and white space allowed";
            }
        }
        // customer phone number vlidation
        if (strlen($_POST['cphone'])>10){
            $cphoneERR ="max length is 10 numbers";
        }else{
            // parsing input data to the variable 
            $cphone = test_input($_POST['cphone']);
            if (preg_match("/^[0-9]+$/", $cphone)){
                $cphoneERR =  "only letters and white space allowed";
            }
        }
        // validate email
            $email = test_input($_POST['cemail']);
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $cemailERR = "invalid email format";
            }

        // vallidate address 
        if (strlen($_POST['caddress'])>250){
            $caddressERR ="max length is 250 numbers";
        }else {
            $caddress =  test_input($_POST['caddress']);
        }



        

        $cus_t_amount = $_POST['cus_t_amount'];
        $cus_r_discount = $_POST['cus_r_discount'];
        $cus_t_discount = $_POST['cus_t_discount'];
        $cnote = $_POST['cnote'];

        $sql = " INSERT INTO customer SET 
    
           customer_name = '$cname',
           cus_email = '$cemail',
           cus_pnumber = '$cphone',
           cus_address = '$caddress',
           reguler_discount = '$cus_r_discount',
           cus_note = '$cnote',
           cus_t_amount = '$cus_t_amount',
           cus_id = '$customerId',
           cus_t_discount = '$cus_t_discount' ";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "query sucessfull";
        } else {
            echo "query failed";
        }
    }
}
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
                        <!-- body starts here -->
                        <!-- block start here -->
                        <div class="page-wrapper">
                            <div class="container-fluid p-t-10">
                                <div class="flashmessage"></div>
                                <div class="row m-b-10">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php ?>Customer/View" class="text-white"><i class="" aria-hidden="true"></i> Manage Customer </a></button>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="card card-outline-info">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-black">New Customer <span class="pull-right date-display"><?php date_default_timezone_set("Asia/colombo");
                                                                                                                                    echo date("l jS \of F Y h:i:s A") ?></span></h4>
                                                </div>
                                                <div class="card-body">

                                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-horizontal" id="cmodel" enctype="multipart/form-data" accept-charset="utf-8">

                                                        <div class="form-body">

                                                            <div class="row">

                                                                <div class="col-md-6">

                                                                    <div class="form-group row">

                                                                        <label class="col-md-3"></label>

                                                                        <div class="col-md-9">

                                                                            <label for="radio_1"><b>Regular Customer</b></label>

                                                                        </div>

                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group row">

                                                                <label class="control-label text-right col-md-3">Customer Name</label>

                                                                <div class="col-md-9">

                                                                    <input type="text" class="form-control cname" name="cname" placeholder="Customer Name" required minlength="1" value="" required>
                                                                        <span style="color: red; text-align:center;"><?php echo $cnameERR; ?></span>
                                                                </div>

                                                            </div>

                                                        </div>


                                                        <div class="col-md-6">

                                                            <div class="form-group row">

                                                                <label class="control-label text-right col-md-3">Phone Number</label>

                                                                <div class="col-md-9">

                                                                    <input type="number" class="form-control sphone" placeholder="Phone Number..." name="cphone"  maxlength="10">
                                                                   <span style="color: red;"> <?php echo $cphoneERR ?> </span>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group row">

                                                                <label class="control-label text-right col-md-3">Email </label>

                                                                <div class="col-md-9">

                                                                    <input type="email" class="form-control cemail" name="cemail" placeholder="Email">
                                                                    <span style="color:red"><?php echo $cemailERR; ?></span>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group row">

                                                                <label class="control-label text-right col-md-3">Address</label>

                                                                <div class="col-md-9">

                                                                    <input type="text" class="form-control caddress" name="caddress" placeholder="address">

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6" id="tamount">

                                                            <div class="form-group row">

                                                                <label class="control-label text-right col-md-3">Target Amount </label>

                                                                <div class="col-md-9">

                                                                    <input type="number" name="cus_t_amount" class="form-control tamount" placeholder="Target Amount">

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6" id="cregular">

                                                            <div class="form-group row">

                                                                <label class="control-label text-right col-md-3">Regular Discount %</label>

                                                                <div class="col-md-9">

                                                                    <input type="number" name="cus_r_discount" class="form-control rdiscount" placeholder="Regular Discount" maxlength="3">

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6" id="tdiscount">

                                                            <div class="form-group row">

                                                                <label class="control-label text-right col-md-3">Target Discount %</label>

                                                                <div class="col-md-9">

                                                                    <input type="number" name="cus_t_discount" class="form-control tdiscount" placeholder="Discount" maxlength="3">

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group row">

                                                                <label class="control-label text-right col-md-3">Note</label>

                                                                <div class="col-md-9">

                                                                    <textarea class="form-control cnote" name="cnote" rows="1"></textarea>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <!--/row-->

                                                </div>

                                                <hr>

                                                <div class="form-actions">

                                                    <div class="row justify-content-md-center">

                                                        <div class=" col-md-offset-2 col-md-4 ">

                                                            <button type="submit" name="submit" class="btn btn-info" value="Submit">Submit</button>

                                                            <button type="button" class="btn btn-inverse">Cancel</button>

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

                        <!-- end of blocks -->


                        <!-- body ends here -->
                    </div>
                </div>
                <!-- footer start here always add footer in up to 2 div -->
                <?php require 'footer.php'; ?>
                <!-- footer end here -->
            </div>
        </div>
    </body>