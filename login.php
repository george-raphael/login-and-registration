<?php
session_start();
$error = ''; 
if(@$_POST['login']){
$username = $_POST['username'];
$password = sha1($_POST['password']);

$db_name = "system";
$db_password = "";
$db_user ="root";
$db_host = "localhost";

$connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);
$sql  = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$results = mysqli_query($connection,$sql);
if(mysqli_num_rows($results)>0){
	while($row = mysqli_fetch_array($results)){
		$_SESSION['username'] = $row['username'];
		header("location: ./dashboard.php");
	}
}else{
	$error = "Username and password doesn't match";
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
					<h3 class="title">Login</h3>
					<p class="subtitle">Please login below to proceed</p>
					<div class="box">	
						<form action="" method="post">
							<p class="help is-danger"><?php echo $error; ?></p>
							<div class="field">	
								<div class="control">	
										<input name="username" type="text" class="input" placeholder="username">
								</div>
							</div>
							<div class="field">	
								<div class="control">	
										<input name="password" type="password" class="input" placeholder="password">
								</div>
							</div>
							<input name="login" type="submit" class="button is-medium is-info is-fullwidth" value="Login"> 
						</form>
					</div>
				</div>

			</div>
		</div>
		
	</section>
	
</body>
</html>