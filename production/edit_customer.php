<!-- id get erorr sloving -->
<?php  $id=""; 
if(isset($_GET['ids'])){
    $id = $_GET['ids'];
    
}else{
    echo "id not found";
}
?>
<!-- ends -->
<?php
include 'conn.php';
$id = $_GET['ids'];
echo $id;

$update = "SELECT * FROM customer WHERE c_id = $id";
$updatequery = mysqli_query($conn, $update);
$result = mysqli_fetch_assoc($updatequery);


if(isset($_POST['submit'])){
   
    $id = $_GET['ids'];
    echo $id;
    
        $Customer_Name= $_POST['Customer_Name'];
        $Phone_Number=$_POST['Phone_Number'];
        $Email=$_POST['Email'];
        $Address=$_POST['Address'];
        $Target_Amount=$_POST['Target_Amount'];
        $Regular_Discount=$_POST['Regular_Discount'];
        $Target_Discount=$_POST['Target_Discount'];
        $note = $_POST['note'];

      $insertquery =  "UPDATE customer SET
        customer_name ='$Customer_Name',
        cus_pnumber ='$Phone_Number',
        cus_email ='$Email',
        cus_address='$Address',
        cus_t_amount = '$Target_Amount',
        reguler_discount='$Regular_Discount',
        cus_t_discount='$Target_Discount',
        cus_note = '$note' WHERE c_id = $id";
        $mysqliquery = mysqli_query($conn, $insertquery);
    if($insertquery){
        ?>
        <?php  echo "update successfull" ?>
    <script>
        window.location.replace("manage_customer.php");
    </script>

<?php 

    }else{
        echo 'Not Updated';
    }
}  ?>

<!-- cansel button redirect to the back page -->
<?php
if (isset($_POST['cancel'])) {
    echo '<script>window.location.href = "manage_customer.php";</script>';
    exit; // Make sure to exit after the redirect
}
?>
<!-- code end -->
<!-- close button redirect to back page -->
<script>
    function redirectToAnotherPage() {
        window.location.href = "manage_customer.php";
    }
</script>
<!--  -->




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
	color: rgb(156,131,33);
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
   
}
	
</style>

</head>
<body>


<div style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; text-align: center; font-size: 30px; position: relative; top: 150px;">
    <a href="#" class="edit" data-toggle="modal" data-target="#editEmployeeModal" id="openEditModal"><!-- this is a link  --><i class="material-icons" data-toggle="tooltip" title="Update">&#xE254;</i></a>
</div>

<!-- Update Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="#">
                <div class="modal-header">                        
                    <h4 class="modal-title">Update Data</h4>
                    <button type="button" name = "close"   class="close" data-dismiss="modal" aria-hidden="true" onclick="redirectToAnotherPage()">&times;</button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" name="Customer_Name" class="form-control" value="<?php echo $result['customer_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="Phone_Number" class="form-control" value="<?php echo $result['cus_pnumber']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="Email" class="form-control" value="<?php echo $result['cus_email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="Address" class="form-control" value="<?php echo $result['cus_address']; ?>" required>
                    </div>                    
                                   
                    <div class="form-group">
                        <label>Target Amount</label>
                        <input type="number" name="Target_Amount" class="form-control" value="<?php echo $result['cus_t_amount']; ?>" required>
                    </div>                    
                    <div class="form-group">
                        <label>Regular Discount</label>
                        <input type="number" name="Regular_Discount" class="form-control" value="<?php echo $result['reguler_discount']; ?>" required>
                    </div>                    
                    <div class="form-group">
                        <label>Target Discount	</label>
                        <input type="number" name="Target_Discount" class="form-control" value="<?php echo $result['cus_t_discount']; ?>" >
                    </div>                    
                
                <div class="form-group">
                        <label>Note	</label>
                        <input type="text" name="note" class="form-control" value="<?php echo $result['cus_note']; ?>" required>
                    </div> 
                    </div>   
                <div class="modal-footer">
                    <input type="submit"  name ="cancel" class="btn btn-default"  value="Cancel">
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