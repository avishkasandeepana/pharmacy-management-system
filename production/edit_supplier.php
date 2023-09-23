<!-- get row id -->
<?php $rowid = "";
if (isset($_GET['idc'])) {
    $rowid = $_GET['idc'];
    echo $rowid;
} else {
    echo "rowid not found";
}   ?>
<!-- getting over row id -->

<?php require 'sidebar.php'; ?>
<?php require 'conn.php'; ?>

<?php
$query = "SELECT * FROM supplier WHERE id = $rowid";
echo $rowid;
$runquery = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($runquery);
?>
<?php
if (isset($_POST['submit'])) {
    $rowid = $_GET['idc'];
    $suppliername = $_POST['sname'];
    $phonenumber = $_POST['sphone'];
    $email = $_POST['semail'];
    $address = $_POST['saddress'];
    $note = $_POST['snote'];
    $status = $_POST['status'];

    $insertquery = "UPDATE supplier set 
      s_name = '$suppliername',
      s_phone = '$phonenumber',
      s_email = '$email',
      s_address = '$address',
      s_note = '$note',
      s_status = '$status'
      WHERE id = $rowid
      limit 1";


    $runInsertQuery = mysqli_query($conn, $insertquery);

    if ($insertquery) {
        echo "query run sucessfully"; ?>
        <script>
            window.location.replace("manage_supplier.php")
        </script>

<?php } else {
        echo "query failed";
    }
} else {
    echo "user unsubmit ";
}
?>
<?php //setting when update and click cansel user redirect to main page 
if (isset($_POST['close'])) {

    echo "close succeed"; ?><script>
        window.location.replace("manage_supplier.php")
    </script>
<?php }
//setting over
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
                <div class="row" style="display: inline-block;">
                    <!-- body start here -->
                    <!--Modal-->
                    <div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Supplier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="#" method="post" id="supplierfORM" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Supplier Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="sname" class="form-control" placeholder="Supplier name" value="<?php echo $result['s_name'] ?>" required minlength="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Phone Name</label>
                                                    <div class="col-md-9">
                                                        <input type="number" name="sphone" value="<?php echo $result['s_phone'] ?>" class="form-control" placeholder="Phone name" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" oninput="this.value = Math.abs(this.value)">
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" name="semail" value="<?php echo $result['s_email'] ?>" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Address</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="saddress" value="<?php echo $result['s_address'] ?>" class="form-control" placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Note</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="snote" value="<?php echo $result['s_note'] ?>" rows="1"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Status</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="status" id="status" value="<?php echo $status = $result['s_status'] ?>">
                                                        <option value="Active" <?php if ($status == 'active') echo 'selected' ?>>Active</option>
                                                        <option value="Inactive" <?php if ($status == 'inactive') echo 'selected="selected"' ?>>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="sid" value="">
                                <button type="button" name="close" class="btn btn-secondary" onclick="redirectToManageSupplier()">Close</button>
<button type="submit" name="submit" class="btn btn-info" onclick="redirectToManageSupplier()">Submit</button>

<script>
  function redirectToManageSupplier() {
    window.location.href = "manage_supplier.php";
  }
</script>

                            </div>
                            </form>
                        </div>

                        <!-- body ends here -->

                    </div>
                </div>
                <!-- footer start here always add footer in up to 2 div -->
                <?php require 'footer.php'; ?>
                <!-- footer end here -->
            </div>
        </div>
        <script>
            // Automatically open the supplierModal when the page loads
            document.addEventListener('DOMContentLoaded', function() {
                $('#supplierModal').modal('show');
            });
        </script>
</body>

</html>
<?php mysqli_close($conn); ?>