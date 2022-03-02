<?php
    session_start();
    include "config.php";
    
    if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
 
    if(isset($_POST['submit'])){
        
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users_log WHERE id = $id";
        $qry = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($qry);
        if($result){

        }
        else{
            echo "error" . $sql .'<br>'. $conn->error;
        }
        $data = $result['id'];

        $url = "https://quickchart.io/qr?text={$data}";
        $output = $url;
        
        
        
    }
    
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-light">
    
<div class="container py-5">
    <div class="row">
        <div class="col-md-5 col-12 shadow bg-white mx-auto p-4">
            <h2 class="text-center">QR Code Generator</h2>
                <?php if(isset($output)) { ?>
                <div class="mb-3">
                    <img src="<?php echo $output ?>" alt="QR Code" width="100%" height="100%">
                </div>
                <?php } ?>
             <form action="" method="post">
                 
                 <?php
                 if(isset($row)){
                     ?>
                     <p> <?php echo "account ". $row['user']?></p>
                     <?php
                 }
                 ?>
                <div class="mt-3">
                    <button type="submit" name="submit" class="btn btn-primary">Generate QR Code</button>
                </div>
             </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
}else{
     header("Location: index1.php");
     exit();
}
 ?>