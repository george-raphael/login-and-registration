<?php
session_start();
$db_name = "system";
$db_password = "";
$db_user ="root";
$db_host = "localhost";

$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

$error = ''; 
if(@$_POST['register']){
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if($password != $password_confirm){
	$error = "Password mismatch";
}else{
	$password = sha1($password);
	$sql  = "INSERT INTO users VALUES('','$username','$password','$first_name','$last_name')";
	$results = mysqli_query($connection,$sql);
	$insert_id = mysqli_insert_id($connection);
	if($insert_id){
		$_SESSION['id'] = $insert_id;
		$_SESSION['username'] = $username;
		header("location: ./dashboard.php");
	}else{
		$error = "There was an error perfoming the query";
	}
}

}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login System</title>
	<link rel="stylesheet" href="css/bulma.css">
</head>
<body>
	<section class="hero is-primary is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">	
					<h3 class="title">Register</h3>
					<p class="subtitle">Please register below</p>
					<div class="box">	
						<form action="" method="post">
							<p class="help is-danger"><?php echo $error; ?></p>
							<div class="field">	
								<div class="control">	
										<input name="first_name" type="text" class="input" placeholder="First name">
								</div>
							</div>
							<div class="field">	
								<div class="control">	
										<input name="last_name" type="text" class="input" placeholder="Last name">
								</div>
							</div>
							<div class="field">	
								<div class="control">	
										<input name="username" type="text" class="input" placeholder="Username">
								</div>
							</div>
							<div class="field">	
								<div class="control">	
										<input name="password" type="password" class="input" placeholder="Password">
								</div>
							</div>
							<div class="field">	
								<div class="control">	
										<input name="password_confirm" type="password" class="input" placeholder="Passord confirmation">
								</div>
							</div>
							
							<input name="register" type="submit" class="button is-medium is-info is-fullwidth" value="Register"> 
						</form>
					</div>
					<p>
						Already have an account?
						<a href="./login.php">Login</a>
					</p>
				</div>

			</div>
		</div>
		
	</section>
	
</body>
</html>