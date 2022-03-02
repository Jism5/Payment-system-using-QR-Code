<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

     
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="modal/style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
     <a href="logout.php">Logout</a>
     <a href="qrgen.php">scan</a>
</body>
</html>

<?php 
}else{
     header("Location: index1.php");
     exit();
}
 ?>