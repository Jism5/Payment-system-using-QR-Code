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
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resume - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css-main/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Clarence Taylor</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="main.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="paywithqr.php">Pay using QR Code</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">Logout</a></li>

                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            
            <!-- pay with qr code-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Your QR Code</h2>
                    <div class="container py-5">
                        <div class="row">
                            <div class="col-md-5 col-12 shadow bg-white  p-4">
                                <h2 class="text-center">QR Code Generator</h2>
                                    <?php if(isset($output)) { ?>
                                    <div class="mb-3">
                                        <img src="<?php echo $output ?>" alt="QR Code" width="100%" height="100%">
                                    </div>
                                    <?php } ?>
                                <form action="" method="post">
                                    <div class="form-group mb-3 ml-5">
                                    </div>
                                    <?php
                                    if(isset($row)){
                                        ?>
                                        <p> <?php echo "account ". $row['user']?></p>
                                        <?php
                                    }
                                    ?>
                                    <div class="mt-3 ">
                                        <button type="submit" name="submit" class="btn btn-primary ">Generate QR Code</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
            </section>
            
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="scripts.js"></script>
    </body>
</html>
<?php 
}else{
     header("Location: index1.php");
     exit();
}
 ?>