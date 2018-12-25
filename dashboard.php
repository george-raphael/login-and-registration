<?php 
session_start();
//Loging out the user
if(isset($_GET['logout'])){
	session_destroy();
	header("location: ./login.php");
}
//Restrict the dashboard
if(!isset($_SESSION['username'])){
	header('location: ./login.php');
}
$username = $_SESSION['username'];
$id = $_SESSION['id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login System</title>
	<link rel="stylesheet" href="css/bulma.css">
</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="#">
      <img src="./img/logo.jpg" width="56" height="56">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Home
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a href="?logout" class="button is-primary">
            <strong>Logout</strong>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<div class="section">
  <div class="columns">
    <aside class="column is-2">
      <nav class="menu">
        <p class="menu-label">
          General
        </p>
        <ul class="menu-list">
          <li><a class="is-active">Dashboard</a></li>
          <li><a>Customers</a></li>
        </ul>
      </nav>
    </aside>
    <main class="column is-10">
		Welcome somebody
	</main>
  </div>
</div>
</body>
</html>