<?php
session_start();
?>

<?php
require 'conn.php'; // database connection



// in this case the stored hashed password is hashed using this 
// During registration
//$password = $_POST['password']; // Get the password from the user input
//$hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

// Store $hashed_password in the database
//



if (isset($_POST['submit'])) {
    $errors = array();

    if (!isset($_POST['email']) || empty(trim($_POST['email']))) {
        $errors[] = 'Email is missing or invalid';
    }
    if (!isset($_POST['password']) || empty(trim($_POST['password']))) {
        $errors[] = 'Password is missing or invalid';
    }

    if (empty($errors)) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Prepare the database query
        $query = "SELECT * FROM user WHERE em_email = '{$email}' LIMIT 1";
        $resultset = mysqli_query($conn, $query);

        if ($resultset) {
            if (mysqli_num_rows($resultset) == 1) {
                // Valid user found, verify the password
                $user = mysqli_fetch_assoc($resultset);
                if (password_verify($password, $user['em_password'])) {
                    // Password is correct, user is authenticated
                    // Redirect to a logged-in page or perform other actions here
                    //getting logger information and store it to session variable
					$_SESSION['user_id']=$user['id'];
					$_SESSION['user_name']=$user['em_name'];

                    // update last login
                    $query = "UPDATE user SET last_login = NOW()";
                    $query .= "WHERE id = {$_SESSION['user_id']} LIMIT 1";

                        $resultset = mysqli_query($conn,$query);
                        
                        if(!$resultset){
                            die('database query failed');
                        }




					echo "Login successful!";
					header ('location:dashboard.php');
                } else {
                    $errors[] = 'Invalid password';
                }
            } else {
                $errors[] = 'Username/Password missing or Invalid';
            }
        } else {
            $errors[] = 'Database query failed';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
		body {
			font-size: 14px;
			font-family: 'Times New Roman', Times, serif;
		}
		.login {
			width: 350px;
			margin: 100px auto;

			background-color: lightslategrey;
		}
		input {
			display: block;
			width: 100%;
			padding: 5px;
			box-sizing: border-box;

		}
		button {
			width: 100%;
			height: 25px;
			background-color: lightgreen;
			border-color:lightgreen ;
			padding: 5px;
			margin-bottom: 10px;
		}
		.error{
			
		}
		</style>
</head>
<body>
<div class="login">
    <form method="post" action="#">
        <fieldset>
            <legend><h1>LOGIN</h1></legend>
            <div class="error">
                <?php
                if (!empty($errors)) {
                    echo '<ul>';
                    foreach ($errors as $error) {
                        echo '<li>' . htmlspecialchars($error) . '</li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>

            <label>Email:</label>
            <input type="text" name="email" placeholder="Email"><br>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit" name="submit" value="submit">Submit</button>
        </fieldset>
    </form>
</div>

</body>
</html>
