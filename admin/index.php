<?php
include 'db.php';
session_start();
if(isset($_SESSION['type']))
$i = strcmp($_SESSION['type'],"admin");
if(isset($_SESSION['id']) && ($i==0)){
	header('location:add.php');
}
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
form{
	margin-top:10px;
	padding: 50px;
	background: #ccc;
}
</style>
<title>
Admin | Virtual Classroom
</title>
</head>
<body>

<div class="container">
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/115-200.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Virtual Classroom
  </a>
</nav>

<form action="index.php" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
  </div>
  
  <button type="submit" name="login" class="btn btn-primary">Login</button>
  
<?php
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = hash("sha512",$_POST['password']);
	$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn,$query);
	$count = mysqli_affected_rows($conn);
	if($count > 0 ){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id'] = $row['id'];
		$_SESSION['type'] = 'admin';
		header('location:add.php');
	}else{
		echo '<p class="text-danger">Login Failed</p>';
		
	}
}
?>
</form>

</div>
</body>
</html>