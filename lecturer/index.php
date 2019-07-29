<?php 
include '../admin/db.php';
session_start();
$i = strcmp($_SESSION['type'],"lecturer");
if((!isset($_SESSION['id'])) || ($i!=0)){
	session_destroy();
	header('location:../');
}
if(isset($_POST['logout'])){
	session_destroy();
	header("location:../");
}

$branch = $_SESSION['branch'];
$subject = $_SESSION['subject'];


if(isset($_POST['upload'])){
	extract($_POST);

	$name = $_POST['name'];
	$target_dir = "video/";
 
	$target_file = $target_dir . basename($_FILES["video"]["name"]);
 
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
	if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg"){
		echo "File Format Not Suppoted";
	} 
 
	else{
		$target_file = $target_dir . time().".".$imageFileType;
 
		$video_path=time().".".$imageFileType;
 
		$query = "INSERT INTO video (name,link,branch,subject) VALUES ('$name','$video_path','$branch','$subject')";
		
		mysqli_query($conn,$query);
 
		move_uploaded_file($_FILES["video"]["tmp_name"],$target_file);
	
	}
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
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link" href="table.php">Students</a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<form action="index.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name To Be Shown</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <input type="file" id="video" name="video">
  </div>
  
  <button type="submit" name="upload" class="btn btn-primary">Upload</button>
</form>

</div>
</body>
</html>