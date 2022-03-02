<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>


<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>QR Code | Log in</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="js/instascan.min.js"></script>
		
    </head>
        
       <div class="container">
            <div class="row">
                <video id="preview" width="30%"></video>
				
                <div class="col-md-8">

               <form action="insert.php" method="post" class="form-horizontal">
                   <label> scan qr code</label>
               <input type="number" name="text" readonly="" id="text" placeholder="scan qrcode" class="form-control"   autofocus>
            

               </form>
	
        <script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
               document.forms[0].submit();
           });
        </script>
		
    </body>
</html>
<?php 
}else{
     header("Location: index1.php");
     exit();
}
 ?>