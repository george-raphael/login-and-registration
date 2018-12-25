<?php 
session_start();
$username = $_SESSION['username'];
 ?>
<h1>Dashboard Area</h1>
<p>Welcome, <?php echo $username; ?></p>