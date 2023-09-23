<?php require 'sidebar.php'; ?>
<?php require 'conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">


	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
			color: rgb();
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}

		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			min-width: 1000px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: #435d7d;
			color: #fff;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 200px;
		}

		table.table tr th:last-child {
			width: 100px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #45e108;
		}

		table.table td a.delete {
			color: red;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		/* Custom checkbox */
		.custom-checkbox {
			position: relative;
		}

		.custom-checkbox input[type="checkbox"] {
			opacity: 0;
			position: absolute;
			margin: 5px 0 0 3px;
			z-index: 9;
		}

		.custom-checkbox label:before {
			width: 18px;
			height: 18px;
		}

		.custom-checkbox label:before {
			content: '';
			margin-right: 10px;
			display: inline-block;
			vertical-align: text-top;
			background: white;
			border: 1px solid #bbb;
			border-radius: 2px;
			box-sizing: border-box;
			z-index: 2;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			content: '';
			position: absolute;
			left: 6px;
			top: 3px;
			width: 6px;
			height: 11px;
			border: solid #000;
			border-width: 0 3px 3px 0;
			transform: inherit;
			z-index: 3;
			transform: rotateZ(45deg);
		}

		.custom-checkbox input[type="checkbox"]:checked+label:before {
			border-color: #03A9F4;
			background: #03A9F4;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			border-color: #fff;
		}

		.custom-checkbox input[type="checkbox"]:disabled+label:before {
			color: #b8b8b8;
			cursor: auto;
			box-shadow: none;
			background: #ddd;
		}

		/* Modal styles */
		.modal .modal-dialog {
			max-width: 400px;
		}

		.modal .modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 20px 30px;
		}

		.modal .modal-content {
			border-radius: 3px;
			font-size: 14px;
		}

		.modal .modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal .modal-title {
			display: inline-block;
		}

		.modal .form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
		}

		.modal textarea.form-control {
			resize: vertical;
		}

		.modal .btn {
			border-radius: 2px;
			min-width: 100px;
		}

		.modal form label {
			font-weight: normal;
		}

		.crud {
			position: relative;
			left: 40rem;
			top: 10px;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
	</style>
	<script>
		$(document).ready(function() {
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function() {
				if (this.checked) {
					checkbox.each(function() {
						this.checked = true;
					});
				} else {
					checkbox.each(function() {
						this.checked = false;
					});
				}
			});
			checkbox.click(function() {
				if (!this.checked) {
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>




	<!-- end of links -->
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="right_col" role="main">
				<div class="row" style="display: inline-block;">

					<!-- table starts here -->


					<div class="crud">

					</div>
					<div class="container-xl">
						<div class="table-responsive">
							<div class="table-wrapper">
								<a href="generate_pdf.php" class="btn btn-primary">Download PDF</a>


								<div class="table-title">

									<div class="row">
										<div class="col-sm-6">
											<h2> <b>Manage Employee</b></h2>
										</div>
										<div class="col-sm-6">
											<a href="add_employee.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add Employee</span></a>

										</div>
									</div>
								</div>

								<table class="table table-striped table-hover">
									<thead>
										<tr>

											<th>Employee Name</th>
											<th>Phone Number</th>
											<th>Email</th>
											<th>Role</th>
											<th>Last Login</th>
											<th>Action</th>
											

										</tr>
									</thead>
									<tbody>
										<?php

										$query = 'SELECT * FROM user WHERE is_deleted=0';
										$mysqliquery = mysqli_query($conn, $query);
										while ($result = mysqli_fetch_assoc($mysqliquery)) {
										?>
											<tr>
												<td>
													<?php echo $result['em_name']; ?>
												</td>
												<td>
													<?php echo $result['em_contact']; ?>
												</td>
												<td>
													<?php echo $result['em_email']; ?>
												</td>
												<td>
													<?php echo $result['em_role']; ?>
												</td>
												<td>
													<?php echo $result['last_login']; ?>
												</td>


												<td>
													<a href="edit_employee.php?id=<?php echo $result['id']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Update">&#xE254;</i></a>
													<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="modal" title="Delete">&#xE872;</i></a>
													<!-- getting  med id for the delete row -->
													<?php $medid = $result['id']; ?>
													<!-- med id getting over -->

												</td>

											</tr>

										<?php
										}
										?>

										<!-- delete query start here -->
										<?php
										if (isset($_POST['delete'])) {
											include 'conn.php';
											$id = $_POST['deleteMedId']; // Use the ID from the hidden field
											$id = $medid;
											$delete = "DELETE FROM user WHERE id = $id";
											$deletequery = mysqli_query($conn, $delete);
											if ($deletequery) {
										?>
												<script>
													window.location.replace("manage_employee.php");
												</script>

										<?php

											} else {
												echo 'Not deleted';
											}
										}
										?>

										<!-- delete query ends here  -->






									</tbody>
								</table>

							</div>
						</div>

						<!-- delete modele -->
						<div id="deleteEmployeeModal" class="modal fade" data-id="<?php echo $result['id']; ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<form method="post">
										<div class="modal-header">
											<input type="hidden" id="deleteMedId" name="deleteMedId" value="">
											<h4 class="modal-title">Delete Data</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">
											<p>Are you sure you want to delete these Records?</p>
											<p class="text-danger"><b>This action cannot be undone.</b></p>
										</div>
										<div class="modal-footer">
											<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
											<input type="submit" name="delete" class="btn btn-danger" value="Delete">
										</div>
									</form>
								</div>
							</div>
						</div>


						<!-- table ends here -->

						<!-- script for delete model replace id  -->
						<script>
							$(document).ready(function() {
								$('.delete').click(function() {
									var medId = $(this).data('id');
									$('#deleteMedId').val(medId);
								});
							});
						</script>


					</div>
				</div>
				<!-- footer start here always add footer in up to 2 div -->
				<?php require 'footer.php'; ?>
				<!-- footer end here -->
			</div>
		</div>




		<script src="build/custom.js"></script>



</body>



</html>