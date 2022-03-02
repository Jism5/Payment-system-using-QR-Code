<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

$conn = new mysqli($server, $username,$password,$dbname);

if($conn->connect_error){
    die("connection failed" .$conn->connect_error);
}



if(isset($_POST['submit'])){


    $text = $_POST['text'];

     $sql = "INSERT INTO riders_log(STUDENTID, TIMEIN) VALUES('$text', NOW())";
          if($conn->query($sql) === TRUE){

        echo "success";

        }
          else {

        echo "error : " .$sql. "<br>" .$conn->error;

        }

    }


 $conn->close();


?>



<!DOCTYPE html><html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Confirmation</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
    body{
        margin: 50px 15px 0;
        font-family: 'Open Sans', sans-serif;
    }
    h1{
        color: #2FAC66;
        font-weight: bold;
        padding-bottom: 15px;
    }
    p{
        color: #666;
        font-size: 16px;
    }
    i{
        color: #2FAC66;
        width: 60px;
        height: 60px;
        border-radius: 60px;
        background: #f2f2f2;
        display: inline-block;
        line-height: 62px;
        font-size: 28px;
    }
</style>
</head> 
<body>
<div class="text-center"> 
    <i class="icon-box"><span class="glyphicon glyphicon-ok"></span></i>
    <h1>Confirmation</h1>
    <p>Form submitted successfully. It's just for testing purpose, data not saved.</p>
</div>

</body></html>