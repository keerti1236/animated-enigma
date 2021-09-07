<?php
 include('config/db_connect.php');
  $connect = mysqli_connect("localhost", "KD", "12345676", "tasty-grab");

  
	// write query for all pizzas
	$sql = "SELECT * FROM pizza";

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array

  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
   
    if(isset($_POST['delete'])){

		$pizza_name = mysqli_real_escape_string($conn, $_POST['pizza_name']);

    $sql = "DELETE FROM `pizza` WHERE `pizza`.`pizza_name` = '$pizza_name'";

		if(mysqli_query($conn, $sql)){
     
      mail('dvpk511@gmail.com','Deleted pizza','TASTY-GRAB!!\n Deleted Pizza\n Thank you','FROM: official.tasty.grab@gmail.com');
 
            echo '<script>alert("Deleted Pizza Successfully");</script>';
			
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

    }
    mysqli_close($conn);

?>


<!DOCTYPE html>  
 <html>  <head>
 <title>Delete Pizza</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	  <body>  
    <nav class="black lighten-2">
     <div class="container " >
     <a href="#" class="brand-logo brand-text">Tasty Grab!!</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li>ADMIN Page</li>
        <li><a href="add.php" class="btn brand z-depth-0">ADD PIZZA</a></li>
        <li><a href="adminpage.php" class="btn brand z-depth-0">VIEW ORDERS</a></li>
        <li><a href="Main.php" class="btn brand z-depth-0">LOGOUT</a></li>
        <li><a href="viewfeedback.php" class="btn brand z-depth-0">Customer feedback</a></li>
      </ul>
    </div>
  </nav>

	<h4 class="center grey-text">Pizzas!!</h4>
    <div class="table-responsive">
<table>
    <thead>
    <tr>
      <th scope="col" width="10%">Pizza Name</th>
      <th scope="col" width="20%">cost</th>

      <th scope="col" width="15%"></th>

    </tr>
  </thead>
</table>
    </div>
    <?php foreach($pizzas as $pizza): ?>
        <div class="table-responsive">
        <table class="table">

  <tbody>
 
    <tr>
      <td width="10%"><h6><?php echo htmlspecialchars($pizza['pizza_name']); ?></h6></td>
      <td width="20%"><h6><?php echo htmlspecialchars($pizza['cost']); ?></h6></td>
    <td width ="15%"> <form action="delete.php" method="POST">
				<input type="hidden" name="pizza_name" value="<?php echo $pizza['pizza_name']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>
    </td>
    </tr>
  </tbody>
</table>
        </div>
			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>