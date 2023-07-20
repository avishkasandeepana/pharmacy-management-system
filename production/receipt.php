
<!-- grtting values from the pos.php file -->


<?php
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