<?php   
$email='';
$place='';

$errors = array('place' => '');
 session_start(); 
 $email=$_SESSION['email'];
 $_SESSION['vemail']=$email;
 // Works if session cookie was accepted
echo '<br /><a href="vieworders.php"></a>';

// Or pass along the session id, if needed
echo '<br /><a href="vieworders.php?' . SID . '"></a>';
 $connect = mysqli_connect("localhost", "KD", "12345676", "tasty-grab");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_name");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_name'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart1.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_name'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_name"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart1.php"</script>';  
                }  
           }  
      }  
 }

 if(isset($_POST['submit'])){
     if(empty($_POST['place'])){
          $errors['place'] = 'Enter Place';
      } else{
          $place = $_POST['place'];
          if(!preg_match('/^[a-zA-Z0-9\s]+$/', $name)){
              $errors['Place'] = 'Enter Valid input';
          }
      }
     }
 if(array_filter($errors)){
 }else{
 if(isset($_POST["orders"])) {
     
     if(empty($_POST['place'])){
          $errors['place'] = 'Enter place of Delivery';
     } 
     else{
          $place = $_POST['place'];
          if(!preg_match('/^[a-zA-Z 0-9\s]+$/', $place)){
               $errors['place'] = 'Place name must be a letters';
          }
     }

     $place=  mysqli_real_escape_string($connect, $_POST['place']);

   if(!empty($_SESSION["shopping_cart"]))  
   {   
        $total = 0;  
        foreach($_SESSION["shopping_cart"] as $keys => $values)  
        {  $pizza_name= $values["item_name"];
          $qty=number_format($values["item_quantity"]);
          $total=number_format($values["item_quantity"] * $values["item_price"],2);
          $sql= "INSERT INTO `orders` (`order_id`, `email_id`, `pizza_name`, `area`, `qty`, `total`, `time`) VALUES (NULL, '$email', '$pizza_name','$place', '$qty', '$total', CURRENT_TIMESTAMP)";
          if(mysqli_query($connect, $sql))
          {
               // success
               
               mail($email,'Order Confirmed','TASTY-GRAB!!\nYOUR ORDER OF confirmed \n Thank you','FROM: official.tasty.grab@gmail.com');
               mail('dvpk511@gmail.com','Confirmed Order','TASTY-GRAB!!\n Confirmed Order\n Thank you','FROM: official.tasty.grab@gmail.com');
               echo '<script>alert("Order Confirmed");</script>';
            }
               
           

          
              
          } 

          }
         

         
          unset($_SESSION["shopping_cart"]);      
 } }



 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Buy</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <nav class="black lighten-2">
           <div class="container " >
            <a href="#" class="brand-logo brand-text">Tasty Grab!!</a>
           <ul id="nav-mobile" class="right hide-on-small-and-down">
            <li><a href="#order" ><input  type="submit"style="margin-top:5px;" class="btn btn-success" value="ORDER DETAILS"></a></li>
            <li><a href="logout.php" ><input  type="submit" style="margin-top:5px;" class="btn btn-success" value="LOGOUT"></a></li>
            <li><a href="vieworders.php" ><input  type="submit" style="margin-top:5px;" class="btn btn-success" value="ORDERS HISTORY"></a></li>
            <li><a href="feedback.php" ><input  type="submit" style="margin-top:5px;" class="btn btn-success" value="Feedback"></a></li>

          </ul>
       </div>
       </nav>

           <div class="container" style="width:1000px;">  
                
                <?php  
                $query = "SELECT * FROM pizza ORDER BY pizza_name ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="cart1.php?action=add&id=<?php echo $row["pizza_name"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="images/pizza1.jpg" class="img-responsive" /><br /> 
                               <h5 class="text-danger"><?php echo $row["pizza_name"]; ?></h5>   
                               <h4 class="text-danger">Rs.<?php echo $row["cost"]; ?></h4>  
                               <h6>QTY<input type="text" name="quantity" class="form-control" value="1" /></h6>  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["pizza_name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["cost"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <h3><a name="order">Order Details</a></h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>Rs.<?php echo $values["item_price"]; ?></td>  
                               <td>Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart1.php?action=delete&id=<?php echo $values["item_name"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">Rs.<?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <form  method="post" action="cart1.php"><label>Enter Place of Delivery</label>
			           <input type="text" name="place" value="<?php echo htmlspecialchars($place) ?>">
			           <div class="red-text"><?php echo $errors['place']; ?></div>
                          <div class="center">
				      <input type="submit" name="orders" value="Confirm Order" class="btn brand z-depth-0">
                         </div>
                          </form>
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  

      </body>  
 </html>
   