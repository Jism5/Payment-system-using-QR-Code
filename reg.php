<?php
    session_start();
    include_once 'config.php';

    if(isset($_REQUEST['submit'])){

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "INSERT INTO users_log(username, password) VALUES('$user', '$pass')";

        if($conn->query($sql)){
           header("location: login.php");
        }
        else{
            echo "erro" . $sql . "<br>";
            echo $conn->error;
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Elegant Modal Login Modal Form with Avatar Icon</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="modal/style.css">
</head>
<body>


<!-- Modal HTML -->
<div id="myModal" class="">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="/examples/images/avatar.png" alt="Avatar">
				</div>				
				<h4 class="modal-title">Commuter Registration</h4>	
			</div>

			<div class="modal-body">

            <!-- form -->
				<form  method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">	
					</div>    

					<div class="form-group">
						<button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block login-btn">Register</button>
                        <a href="index1.php">Already have account?</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>   
</body>
</html>




