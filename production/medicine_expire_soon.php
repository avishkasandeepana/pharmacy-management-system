<?php
session_start();
$_SESSION['soonExpiringMedicine'] = $soonExpiringMedicine;
?>
<?php require 'index.php'; ?>
<?php require 'conn.php';?>
<?php require 'expire_medicine_cal.php'?>



<?php $soonExpiringMedicine = calculate_expiresoon(); ?>




<!-- end -->
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
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"></h3>
                </div>
            
        
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php ?>Medicine/Create" class="text-white"><i class="" aria-hidden="true"></i> Add Medicine </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php ?>invantory/Stock_out" class="text-white"><i class="" aria-hidden="true"></i> Out of Stock </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php ?>invantory/Stock_short" class="text-white"><i class="" aria-hidden="true"></i> Short Stock </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php ?>invantory/Stock_expired" class="text-white"><i class="" aria-hidden="true"></i> Expired Medicine</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-black">Expire Soon</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Medicine Name</th>
                                                <th>Form</th>
                                                <th>Company</th>
                                                <th>Strength</th>
                                                <th>Quantity Available</th>
                                                <th>Expiry Date</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                
                                           <?php foreach($soonExpiringMedicine as $value): ?>
                                            <tr>
                                                <td><?php echo $value['product_name']?></td>
                                                <td><?php echo $value['form']  ?></td>
                                                <td><?php echo $value['company_name']  ?></td>
                                                <td><?php echo $value['strength']  ?></td>
                                                <td><?php echo $value['quantity']  ?></td>
                                                <td><?php echo $value['expire_date']  ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
        </div>
         
<?php 


?>
        
         
        
        
        <!-- bosy ends here -->
        </div>
        </div>
             <!-- footer start here always add footer in up to 2 div -->
             <?php  require 'footer.php'; ?>
        <!-- footer end here -->
      </div>
    </div>
</body>
</html>
<?php mysqli_close($conn)?>