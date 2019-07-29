<?php

include '../admin/db.php'; 
session_start();
$branch = $_SESSION['branch'];
$i = strcmp($_SESSION['type'],"lecturer");
if((!isset($_SESSION['id'])) || ($i!=0)){
	session_destroy();
	header('location:../');
}
$query = "SELECT * FROM student WHERE branch='$branch'";
$result = mysqli_query($conn,$query);
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
</style>
<title>
Lecturer | Virtual Classroom
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
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
	  
      <li class="nav-item active">
        <a class="nav-link" href="table.php">Students</a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
<?php
	while($r = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $r['id']?></td>
<td><?php echo $r['name']?></td>
</tr>
	<?php }?>
  </tbody>
</table>

</div>
</body>
</html>