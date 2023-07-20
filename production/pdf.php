<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;

$totalGrandAmount = $_POST['total_grand_amount']; // Assuming you are receiving the total grand amount from the form submission
$changeReturn = $_POST['change_return']; // Assuming you are receiving the change return from the form submission
$balance = $_POST['balance']; // Assuming you are receiving the balance from the form submission
$totalPayable = $_POST['total_payable']; // Assuming you are receiving the total payable from the form submission
$totalPaying = $_POST['total_paying']; // Assuming you are receiving the total paying from the form submission
$tableData = $_POST['table_data']; // Assuming you are receiving the table data from the form submission

$html = '
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style>
      /* CSS styles for the invoice */
      /* ... */
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="images/logo.png" alt="Logo">
      </div>
      <h1>INVOICE 3-2-1</h1>
      <div id="company" class="clearfix">
        <div></div>
        <div>455 Kandy Road,<br /> Daulagala</div>
        <div>0812654835</div>
        <div><a href="mailto:sadaruayurvedic@gmail.com">sadaruayurvedic@gmail.com</a></div>
      </div>
      
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="Name">Name</th>
            <th class="quentity">Quantity</th>
            <th>Unit Price</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a recognizable design solution based on the company\'s existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="service">SEO</td>
            <td class="desc">Optimize the site for search engines (SEO)</td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
            <td class="total">$800.00</td>
          </tr>
          <tr>
            <td class="service">Training</td>
            <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
            <td class="total">$160.00</td>
          </tr>
          <tr>
            <td colspan="3">Total</td>
            <td class="total">$5,200.I apologize for the incomplete code in my previous response. Here'

?>
<?php

require 'vendor/autoload.php';



session_start();

// Retrieve the session variables
$totalItems = $_SESSION['totalItems'];
$total = $_SESSION['total'];
$totalPayable = $_SESSION['totalPayable'];
$totalPaying = $_SESSION['totalPaying'];
$balance = $_SESSION['balance'];
$changeReturn = $_SESSION['changeReturn'];
$customerName = $_SESSION['customerName'];

// Clear the session variables if no longer needed
session_unset();
session_destroy();
?>

<!-- grtting values from the pos.php file ends -->



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>payment reciept</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="print_css/custom.css" />
	<link rel="stylesheet" href="print_css/custom2.css" />
</head>

<body>
	<div class="container bootdey">
		<div class="row invoice row-printable">
			<div class="col-md-10">
				<!-- col-lg-12 start here -->
				<div class="panel panel-default plain" id="dash_0">
					<!-- Start .panel -->
					<div class="panel-body p30">
						<div class="row">
							<!-- Start .row -->
							<div class="col-lg-6">
								<!-- col-lg-6 start here -->
								<div class="invoice-logo"><img width="100" src="" alt="Invoice logo"></div>
							</div>
							<!-- col-lg-6 end here -->
							<div class="col-lg-6">
								<!-- col-lg-6 start here -->
								<div class="invoice-from">
									<ul class="list-unstyled text-right">
										<li>Sadaru Ayurvedic</li>
										<li>No 203/23 Kandy Road</li>
										<li>Daulagala</li>

									</ul>
								</div>
							</div>
							<!-- col-lg-6 end here -->
							<div class="col-lg-12">
								<!-- col-lg-12 start here -->
								<div class="invoice-details mt25">
									<div class="well">
										<ul class="list-unstyled mb0">
											<li><strong>Invoice</strong> #936988</li>
											<li><strong>Invoice Date:</strong> Monday, October 10th, 2015</li>
										</ul>
									</div>
								</div>
								<div class="invoice-to mt25">
									<ul class="list-unstyled">
										<li><strong>Invoiced To</strong></li>
									</ul>
								</div>
								<div class="invoice-items">
									<div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th class="per70 text-center">Description</th>
													<th class="per5 text-center">Qty</th>
													<th class="per5 text-center">Price</th>
													<th class="per25 text-center">Total</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1024MB Cloud 2.0 Server - elisium.dynamic.com (12/04/2014 - 01/03/2015)</td>
													<td class="text-center">1</td>
													<td class="text-center">2500rs</td>
													<td class="text-center">$25.00 USD</td>
												</tr>
												<tr>
													<td>Logo design</td>
													<td class="text-center">1</td>
													<td class="text-center">$200.00 USD</td>
												</tr>
												<tr>
													<td>Backup - 1024MB Cloud 2.0 Server - elisium.dynamic.com</td>
													<td class="text-center">12</td>
													<td class="text-center">$12.00 USD</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th colspan="2" class="text-right">Total Items:</th>
													<th class="text-center"><?php echo $totalItems ?></th>
												</tr>
												<tr>
													<th colspan="2" class="text-right">Sub Total:</th>
													<th class="text-center">$237.00 USD</th>
												</tr>
												<tr>
													<th colspan="2" class="text-right">Total Payable:</th>
													<th class="text-center">$47.40 USD</th>
												</tr>
												<tr>
													<th colspan="2" class="text-right">Amount:</th>
													<th class="text-center">$00.00 USD</th>
												</tr>
												<tr>
													<th colspan="2" class="text-right">Balance:</th>
													<th class="text-center">$284.4.40 USD</th>
												</tr>
												<tr>
													<th colspan="2" class="text-right">Change Return:</th>
													<th class="text-center">$284.4.40 USD</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<div class="invoice-footer mt25">
									<p class="text-center">Generated on Monday, October 08th, 2015 <a href="#" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p>
								</div>
							</div>
							<!-- col-lg-12 end here -->
						</div>
						<!-- End .row -->
					</div>
				</div>
				<!-- End .panel -->
			</div>
			<!-- col-lg-12 end here -->
		</div>
	</div>
</body>

</html>

$totalGrandAmount = $_POST['total_grand_amount']; // Assuming you are receiving the total grand amount from the form submission
$changeReturn = $_POST['change_return']; // Assuming you are receiving the change return from the form submission
$balance = $_POST['balance']; // Assuming you are receiving the balance from the form submission
$totalPayable = $_POST['total_payable']; // Assuming you are receiving the total payable from the form submission
$totalPaying = $_POST['total_paying']; // Assuming you are receiving the total paying from the form submission
$tableData = $_POST['table_data']; // Assuming you are receiving the table data from the form submission

$html = '
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style>
      /* CSS styles for the invoice */
      /* ... */
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="images/logo.png" alt="Logo">
      </div>
      <h1>INVOICE 3-2-1</h1>
      <div id="company" class="clearfix">
        <div></div>
        <div>455 Kandy Road,<br /> Daulagala</div>
        <div>0812654835</div>
        <div><a href="mailto:sadaruayurvedic@gmail.com">sadaruayurvedic@gmail.com</a></div>
      </div>
      
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="Name">Name</th>
            <th class="quentity">Quantity</th>
            <th>Unit Price</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $tableData; ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">Total</td>
            <td class="total"><?php echo $totalGrandAmount; ?></td>
          </tr>
          <tr>
            <td colspan="3">Total Payable</td>
            <td class="total"><?php echo $totalPayable; ?></td>
          </tr>
          <tr>
            <td colspan="3">GRAND TOTAL</td>
            <td class="grand total"><?php echo $totalGrandAmount; ?></td>
          </tr>
          <tr>
            <td colspan="3">Balance</td>
            <td class="grand total"><?php echo $balance; ?></td>
          </tr>
        </tfoot>
      </table>
      <div id="notices">
        <!-- ... -->
      </div>
    </main>
    <footer>
      *****COME AGAIN*****
    </footer>
  </body>
</html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('invoice.pdf');
