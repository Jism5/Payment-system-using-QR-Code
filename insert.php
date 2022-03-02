<?php
session_start();
include_once "config.php";


if(isset($_POST['text'])){
    $text = $_POST['text'];

    $id = $_SESSION['id'];
    $select = "SELECT * FROM users_log";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $sql = "UPDATE users_log SET date=NOW() WHERE id = '$id'";
          if($conn->query($sql) === TRUE){
        echo "";

        }
          else {

        echo "error : " .$sql. "<br> " .$conn->error;

        }

    }


      // ORDER BY id DESC LIMIT 1
      // record
      
    $id = $text;
    $qry = mysqli_query($conn,"SELECT * FROM users_log WHERE id = '$id'");
    $row1 = mysqli_fetch_assoc($qry);
    $recordbalance = $row1['balance'];
    
    $user = $row1['id'];

     if($recordbalance <= 0 || $recordbalance < 25){
        echo "Not enough balance" . $recordbalance;
      }
     else{
        $subtotal = $recordbalance - 25;
        //echo $recordbalance. " - ".$row1['balance']." = " .$subtotal;
        $usernew = mysqli_query($conn, "UPDATE users_log set balance='$subtotal' WHERE id = '$user'");
     }

    //rider
     $id = $_SESSION['id'];
      $qry = mysqli_query($conn,"SELECT * FROM riders_log WHERE id = $id");
      $row2 = mysqli_fetch_assoc($qry);
      $storage = $row2['storage'];
      
      //process
    ?><br><?php
   if($recordbalance <= 0 || $recordbalance < 25){
       echo "not enough balance";
   }
   else{
    $ridertotal = $storage + 25; 
     //update 
     $ridernew = mysqli_query($conn, "UPDATE riders_log set storage ='$ridertotal' WHERE id = $id");
  
   }
    
       ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
 </head>
 <body>
   
 <!--  Receipt -->

 <table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Your Receipt</h2>
                                    </td>
                                </tr>
                                <tr>
                                  <?php
                                  if($row1 && $row2){

                                  
                                  ?>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td><?php echo "NAME: ". $row1['username']?><br><?php echo "ID: ". $row1['id']?><br><?php echo "DATE: " .$row1['date']?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                            <td>Payment</td>
                                                            <td class="alignright"><?php echo "Php 25"?></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Your balance</td>
                                                            <td class="alignright"><?php echo "Php ". $row1['balance']?></td>
                                                        </tr>
                                                       
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Total:</td>
                                                            <td class="alignright"><?php echo "Php " .$row1['balance'] . " - 25"?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <a type ="submit" class="confirm" href="rider-main.php">Confirm</a>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        </table>
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>
<?php
  }else{
    $conn->error;
  }
?>
 </body>
 </html>      
