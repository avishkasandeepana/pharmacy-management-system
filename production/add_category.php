<?php require 'index.php'; ?>
<?php require 'conn.php' ?>
<?php  

if (isset($_POST['submit'])){

    $Cate_name = $_POST['Cate_name'];
    $note = $_POST['note'];

    $query = "INSERT INTO medi_category SET 
            category_name = '$Cate_name',
            note  = '$note' ";

            $result = mysqli_query($conn,$query); 

            if (!$result){
                die ('query dosent work');
            }else {
                echo "query sucess";
            }






} else {
    ;
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
         <!-- body start here -->



         <div class="page-wrapper">
            <div class="container-fluid p-t-10">
                <div class="flashmessage"></div>
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php ?>Customer/View" class="text-white"><i class="" aria-hidden="true"></i> Manage Customer </a></button>
    
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <div class="card card-outline-info">
                            <div class="card-header">                                
                                <h4 class="m-b-0 text-black">New Customer <span class="pull-right date-display"><?php date_default_timezone_set("Asia/colombo"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                            </div>
                            <div class="card-body">

                                <form action="add_category.php" method="post" class="form-horizontal" id="cmodel" enctype="multipart/form-data" accept-charset="utf-8">

                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="col-md-3"></label>

                                                    <div class="col-md-9">

                                                            

                                                    </div>

                                                </div>
                                            </div>

                                           

                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Category Name</label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control Cate_name" name="Cate_name" placeholder="Category Name" required minlength="1" value="" required>

                                                    </div>

                                                </div>

                                            </div>


                                           
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Note</label>

                                                    <div class="col-md-9">

                                                        <textarea class="form-control note" name="note" rows="1"></textarea>

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
         
        
        
        <!-- bosy ends here -->
        </div>
        </div>
             <!-- footer start here always add footer in up to 2 div -->
             <?php  require 'footer.php'; ?>
        <!-- footer end here -->
      </div>
    </div>
</body>