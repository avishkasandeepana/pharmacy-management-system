<?php require 'sidebar.php'; ?>
<?php error_reporting(E_ALL);
ini_set('display_errors', 1); ?>

<?php
//<!-- random number to the customer -->
  $supplierId =  time() . mt_rand(100, 999);
$supplierId = 'S'.substr( $supplierId , -7);
// echo $customerId; 
//<!-- random number ends  -->

require 'conn.php';
    if(isset($_POST['submit'])){

        $supplier_name = $_POST['sname'];
        $phone_number =$_POST[ 'sphone'];
        $email =$_POST[ 'semail'];
        $address =$_POST[ 'saddress'];
        $note =$_POST[ 'snote'];
        $status = $_POST['status'];
       

        $query = "INSERT INTO supplier SET 
        
        s_id = '$supplierId',
        s_name = '$supplier_name',
        s_phone = '$phone_number',
        s_email = '$email',
        s_address = '$address',
        s_note = '$note',
        s_status = '$status'";
        

        $runquery = mysqli_query($conn,$query);

        if ($runquery){
            echo 'query run sucessfully';
        }else {
            die('Error: ' . mysqli_error($conn));
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

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="right_col" role="main">
         <div class="row" style="display: inline-block;" >
         <!-- body start here -->

         <div class="page-wrapper">



<div class="container-fluid p-t-10">

<div class="flashmessage"></div>

    <div class="row m-b-10"> 

        <div class="col-12">

            <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="manage_supplier.php"><i class="" aria-hidden="true"></i> Manage Supplier </a></button>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="card card-outline-info">
                <div class="card-header">                                
                    <h4 class="m-b-0 text-black">New Supplier <span class="pull-right"><?php date_default_timezone_set("Asia/colombo"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                </div>
                <div class="card-body">

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="Smodel" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal">

                        <div class="form-body">

                            <hr class="m-t-0 m-b-40">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Supplier Name <span class="text-danger">*</span></label>

                                        <div class="col-md-9">

                                            <input type="text" class="form-control sname" name="sname" placeholder="Supplier Name..." required>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Phone Number <span class="text-danger" >*</span></label>

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
                                            <input type="email" class="form-control semail" name="semail" placeholder="Email...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Address</label>
                                        <div class="col-md-9">
                                            <input type="text" name="saddress" class="form-control saddress" placeholder="Address...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Note</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control snote" name="snote" rows="1" value=""></textarea>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Status</label>
                                        <div class="col-md-9">
                                            <select class="form-control status" name="status" value="" id="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                            
                                <div class="col-md-6 col-sm-12">
                                </div>
                                
                                </div>                                             
                               
                            </div>

                            <!--/row-->

                        </div>

                        <hr>

                        <div class="form-actions">

                            <div class="row justify-content-md-center">

                                <div class=" col-md-offset-2 col-md-4 ">

                                    <button type="submit" name = "submit" class="btn btn-info">Submit</button>

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



         <!-- body ends here -->

        </div>
        </div>
             <!-- footer start here always add footer in up to 2 div -->
             <?php  require 'footer.php'; ?>
        <!-- footer end here -->
      </div>
    </div>
</body>
</html>
<?php mysqli_close($conn) ?>