<?php require_once("conn.php"); ?>
<?php 

	if(isset($_POST['submit'])){

		$errors = array();

		if (!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1 ) {
			$errors[] = 'Username is Missing / Invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
			$errors[] = 'Password is Missing / Invalid';
		}

		// check if there are any errors in the form
		if (empty($errors)) {
			// save username and password into variables
			$username 	= mysqli_real_escape_string($conn, $_POST['username']);
			$password	= mysqli_real_escape_string($conn, $_POST['password']);
			// $hashed_password = sha1($password);

			// prepare database query
			$query = "SELECT * FROM user 
						WHERE em_name = '{$username}' 
						AND em_password = '{$password}' 
						LIMIT 1";

			$result_set = mysqli_query($conn, $query);

			if ($result_set) {
				
				if (mysqli_num_rows($result_set)==1) {
					header('Location: index.php');
				}
				else{
					$errors[] = "Invalied Username or Password";
				}

			}
			else {
				$errors[] = "Database Query Failed.";
			}
			
		}
		

	}



?>


<!DOCTYPE html>
<html>
<head>
	<style>


	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<form action="login.php" method="post" class="userform">
			
			<?php 
				 if (isset($errors) && !empty($errors)) {
				 	echo "Invalied Username or Password.....";
				 }

			?>

			<p>
				<label for="">User Name:</label>
				<input type="text" name="username" >
			</p>

			<p>
				<label for="">Password:</label>
				<input type="text" name="password" >
			</p>

			<p>
				<label for="">&nbsp;</label>
				<button type="submit" name="submit">Login</button>
			</p>

			

		</form>


</body>
</html>
