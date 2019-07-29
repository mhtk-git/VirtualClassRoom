<?php
session_start();
include 'db.php';
$i = strcmp($_SESSION['type'],"admin");
if((!isset($_SESSION['id'])) || ($i!=0)){
	session_destroy();
	header('location:index.php');
}else if(isset($_POST['add-lecturer'])){
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = hash("sha512",$_POST['password']);
	$subject = $_POST['subject'];
	$branch = $_POST['branch'];
	$query = "INSERT iNTO lecturer (name,username,password,branch,subject) VALUES ('$name','$username','$password','$branch','$subject')";
	mysqli_query($conn,$query);
}else if(isset($_POST['add-student'])){
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = hash("sha512",$_POST['password']);
	$branch = $_POST['branch'];
	$query = "INSERT iNTO student (name,username,password,branch) VALUES ('$name','$username','$password','$branch')";
	mysqli_query($conn,$query);
}
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
</style>
<title>
Admin | Virtual Classroom
</title>
</head>
<body>

<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/115-200.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Virtual Classroom
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Add Lecturer</th>
      <th scope="col">Add Student</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
	  

<form action="add.php" method='post'>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Name">
  </div>
  
  
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" required placeholder="Enter Username">
  </div>
  
  
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required placeholder="Enter Password">
  </div>
  
  <div class="form-group">
    <label for="branch">Branch</label>
    <select class="form-control" name="branch" id="branch">
      <option value='IF'>IF</option>
      <option value='CO'>CO</option>
      <option value='EJ'>EJ</option>
	  </select>
  </div>
  
  
  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" required placeholder="Enter Subject">
  </div>
  
  
  <button type="submit" class="btn btn-primary" name="add-lecturer">Add Lecturer</button>

</form>
	
	
	  </td>
      <td>
	  
<form action="add.php" method='post'>

	  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Name">
  </div>
  
  
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" required placeholder="Enter Username">
  </div>
  
  
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required placeholder="Enter Password">
  </div>
  
  <div class="form-group">
    <label for="branch">Branch</label>
    <select class="form-control" name="branch" id="branch">
      <option value='IF'>IF</option>
      <option value='CO'>CO</option>
      <option value='EJ'>EJ</option>
	  </select>
  </div>
  
  <button type="submit" class="btn btn-primary" name="add-student">Add Student</button>

</form>


</td>
    </tr>
  </tbody>
</table>

</body>
</html>