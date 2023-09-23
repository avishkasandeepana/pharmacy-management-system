<?php require 'sidebar.php'; ?>
<?php require 'conn.php' ?>
<?php require 'validate.php' ?>
<?php
$cate_nameERR = $noteERR =    "";
$cate_name = $note =  $sucessfull = "";

if (isset($_POST['submit'])) {

   





    // validation 


    // category validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

         // fetching categoey name
    $check_category = $_POST['cate_name'];
    $sql = "SELECT category_name FROM medi_category WHERE category_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $check_category);
    $stmt->execute();
    $stmt->store_result();
    


        if (empty($_POST['cate_name'])) {
            $cate_nameERR = "Name is required";
        } elseif (strlen($_POST['cate_name']) > 75) {
            $cate_nameERR = "max length is 75 characters";
        }elseif ($stmt->num_rows > 0) {
            $cate_nameERR = "Category name is already IN.";
        } 
        
         else {
            $cate_name = test_input($_POST["cate_name"]);

            // check if cate name only contains letters and white spaces

            if (!preg_match("/^[a-zA-Z\d' -]*$/", $cate_name)) {
                $cate_nameERR = "only letters and white space allowed";
            }
        }
    }


    // note validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (strlen($_POST['note']) > 150) {
            $noteERR = "max length is 150 characters";
        }
        $note = test_input($_POST['note']);
    }


    if (empty($cate_nameERR) && empty($noteERR)) {

        // inser query

        $query = "INSERT INTO medi_category SET 
            category_name = '$cate_name',
            note  = '$note' ";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            die('query dosent work');
        } else {
            $sucessfull = "successfully Added";
        }
    }
} else {;
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
                                                <h4 class="m-b-0 text-black">New Category <span class="pull-right date-display"><?php date_default_timezone_set("Asia/colombo");
                                                                                                                                echo date("l jS \of F Y h:i:s A") ?></span></h4>
                                            </div>
                                            <div class="card-body">

                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-horizontal" id="cmodel" enctype="multipart/form-data" accept-charset="utf-8">

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

                                                                <input type="text" class="form-control Cate_name" name="cate_name" placeholder="Category Name" required minlength="1" value="" required>
                                                                <span class="error" style="color:red ;"> <?php echo $cate_nameERR; ?> </span>
                                                            </div>

                                                        </div>

                                                    </div>



                                                    <div class="col-md-6">

                                                        <div class="form-group row">

                                                            <label class="control-label text-right col-md-3">Note</label>

                                                            <div class="col-md-9">

                                                                <textarea class="form-control note" name="note" rows="1"></textarea>
                                                                <span class="error" style="color:red ;"> <?php echo $noteERR; ?> </span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div style="color: green; align:center;"><b><?php echo $sucessfull ?></b></div>

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
            <?php require 'footer.php'; ?>
            <!-- footer end here -->
        </div>
        </div>
    </body>