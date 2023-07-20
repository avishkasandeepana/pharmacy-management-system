<?php require 'index.php'; ?>
<!-- random number for the customer -->
<?php  $customerId =  time() . mt_rand(100, 999);
$customerId = 'C'.substr( $customerId , -7);
// echo $customerId; ?>
<!-- random number ends  -->

<?php  require 'conn.php';

 if (isset($_POST['submit'])){
    

    $cname = $_POST ['cname'];
    $cphone = $_POST ['cphone'];
    $cphone= $_POST ['cphone'];
    $cemail= $_POST ['cemail'];
    $caddress = $_POST ['caddress'];
    $cus_t_amount = $_POST ['cus_t_amount'];
    $cus_r_discount = $_POST ['cus_r_discount'];
    $cus_t_discount = $_POST ['cus_t_discount'];
    $cnote = $_POST ['cnote'];

    $sql = " INSERT INTO customer SET 
    
           customer_name = '$cname',
           cus_email = '$cemail',
           cus_pnumber = '$cphone',
           cus_address = '$caddress',
           reguler_discount = '$cus_r_discount',
           cus_note = '$cnote',
           cus_t_amount = '$cus_t_amount',
           cus_id = '$customerId',
           cus_t_discount = '$cus_t_discount' " ;

           $result = mysqli_query($conn,$sql);

           if ($result ){
            echo "query sucessfull";
           }else {
            echo "query failed";
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
         <div class="row" style="display: inline-block;" >
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
                                <h4 class="m-b-0 text-black">New Customer <span class="pull-right date-display"><?php date_default_timezone_set("Asia/colombo"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                            </div>
                            <div class="card-body">

                                <form action="add_customer.php" method="post" class="form-horizontal" id="cmodel" enctype="multipart/form-data" accept-charset="utf-8">

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

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Phone Number</label>

                                                    <div class="col-md-9">

                                                    <input type="number" class="form-control sphone" placeholder="Phone Number..." name="sphone" oninput="validateInput(this)" maxlength="10">

<script>
function validateInput(input) {
  // Remove any leading zeroes
  input.value = input.value.replace(/^0+/, '');

  // Check if the number is negative
  if (input.value < 0) {
    input.value = '';
  }

  // Limit the maximum number of digits to 10
  if (input.value.length > 10) {
    input.value = input.value.slice(0, 10);
  }
}
</script>
                                                                        
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Email </label>

                                                    <div class="col-md-9">

                                                        <input type="email" class="form-control cemail" name="cemail" placeholder="Email">

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

                                                    <label class="control-label text-right col-md-3">Target Amount</label>

                                                    <div class="col-md-9">

                                                        <input type="number" name="cus_t_amount" class="form-control tamount" placeholder="">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6" id="cregular">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Regular Discount</label>

                                                    <div class="col-md-9">

                                                        <input type="number" name="cus_r_discount" class="form-control rdiscount" placeholder="" >

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6" id="tdiscount">

                                                <div class="form-group row" >

                                                    <label class="control-label text-right col-md-3">Target Discount</label>

                                                    <div class="col-md-9">

                                                        <input type="number" name="cus_t_discount" class="form-control tdiscount" placeholder="Discount">

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
             <?php  require 'footer.php'; ?>
        <!-- footer end here -->
      </div>
    </div>
</body>









































