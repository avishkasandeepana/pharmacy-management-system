<?php
session_start();
?>
<?php
  //find is user log in to the system using user id, if he not login to the system then he cant access any page without login 

if(!isset($_SESSION['user_id'])){
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <?php  require 'head.php'; ?>
 
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"><i class="fa fa-cart-plus" aria-hidden="true"></i><span>Ayurvedic Center</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome <?php echo $_SESSION['user_name'] ?>,</span>
                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                <li><a href="dashboard.php"><i class="fa fa-cart-plus" aria-hidden="true"></i> Dashboard<span class=""></span> </a> </li>
                  <li><a href="pos.php"><i class="fa fa-cart-plus" aria-hidden="true"></i></i> POS <span class=""></span></a>
                    
                  </li>

                  <li><a><i class="fa fa-edit"></i> Medicine <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_medicine.php">Add Medicine</a></li>
                      <li><a href="manage_medicine.php">Manage Medicine</a></li>
                      <li><a href="add_category.php">Add Category</a></li>

                    </ul>


                  <li><a><i class="fa fa-edit"></i> Customer <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_customer.php">Add Customer</a></li>
                      <li><a href="manage_customer.php">Manage Customer</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Supplier <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_supplier.php">Add Supplier</a></li>
                      <li><a href="manage_supplier.php">Manage Supplier</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Employee <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_employee.php">Add Employee</a></li>
                      <li><a href="manage_employee.php">Manage Employee</a></li>

                    </ul>
                  </li>
                  
                  
               
              </div>
              
            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>
<!-- navi -->
        <div class="top_nav">
          <div class="nav_menu clearfix" >
              <div class="nav toggle float-left">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <?php require 'topnavi.php'; ?>
          </div>
        </div>


        <!-- page content -->
        <!-- <div class="right_col" role="main">


        <?php 

        echo "this is a content";

        ?>
         



        </div> -->
        <!-- /page content -->



    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script  src=" ../build/js/custom.min.js"> </script>
	
  </body>
</html>
