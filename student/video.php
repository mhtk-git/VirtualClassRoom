<?php 
include '../admin/db.php';
session_start();
$i = strcmp($_SESSION['type'],"student");
if((!isset($_SESSION['id'])) || ($i!=0)){
	session_destroy();
	header('location:../');
}
$id = $_GET['id'];
$query = "SELECT * FROM video WHERE id=$id";
$res = mysqli_query($conn,$query);
$r = mysqli_fetch_assoc($res);
$link = "../lecturer/video/".$r['link'];
$subject = $r['subject'];
$name = $r['name'];
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
@media screen and (max-width: 600px) {
  video {
	  width:100%;
  }
}

</style>
<title>
Student | Virtual Classroom
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

<h1 align="center" style= "margin-top:10px"><?php echo $name." - ".$subject?></h1>

	 <video width="600" height="400" style="margin:0 auto;display:block;" controls>
	<source src="<?php echo $link; ?>" type="video/mp4">
	</video> 
</div>
</body>
</html>