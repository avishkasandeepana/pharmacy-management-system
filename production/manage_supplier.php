
<?php require 'sidebar.php'; ?>
<?php require 'conn.php';  ?>
<?php $query = "SELECT * FROM supplier";  
       $runquery = mysqli_query($conn,$query);
       $rows = mysqli_fetch_all($runquery,MYSQLI_ASSOC);
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
         </style>
        <div class="page-wrapper">
            <div class="container-fluid p-t-10">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="add_supplier." class="text-white"><i class="" aria-hidden="true"></i> Add Supplier</a></button>
                    </div>
                </div>
            <div class="flashmessage"></div>
                <div class="row">

                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-black">Manage Supplier </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="w-p-10">Supplier Name</th>
                                                <th class="w-p-10">Phone Number</th>
                                                <th class="w-p-40">Address</th>
                                                <th class="w-p-10">Supplier ID </th>
                                                <th class="w-p-10">Image </th>
                                                <th class="w-p-10">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($rows as $row): ?>
                                            <tr>
                                                <td ><?php echo $row['s_name']; ?></td>
                                                <td><?php echo $row['s_phone']; ?></td>
                                                <td><?php echo $row['s_address']; ?></td>
                                                <td><?php echo $row['s_id']; ?></td>
                                                <td>
                                                   <!-- image goes here  -->
                                                </td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="edit_supplier.php?idc=<?php echo $row['id'] ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light supplierid" data-id=""><i class="fa fa-pencil-square-o" data-toggle="tooltip"></i></a>
                                                    <a href="#deletesupplierModal" title="View" class="btn btn-sm btn-info waves-effect waves-light" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="modal"></i></a>
                                                        <?php   $deleteRow = $row['id']; ?>
                                                </td>

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
             <!-- delete query start -->
 <?php 
 if(isset($_POST['delete'])){
     $deleteRow = $deleteRow ;
    $dquery = "DELETE FROM supplier WHERE id = $deleteRow";
    $runDquery = mysqli_query($conn,$dquery);
    if($runDquery){ ?>
        <script>
    window.location.replace("manage_supplier.php")
</script>
   <?php }else {
        echo "delete failed";
    }
 }else{
    // echo "didnt press delete";
 }
 ?>

 <!-- delete query ends -->

</div>
     <!-- delete modele -->
<div id="deletesupplierModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-danger"><b>This action cannot be undone.</b></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name ="delete" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- delete model ends here -->
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
<?php
// ...

// Close the database connection
mysqli_close($conn);
?>




































