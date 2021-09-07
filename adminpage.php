<?php
  $order_id='';
	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT * FROM orders ORDER BY time DESC ';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
   
    if(isset($_POST['delete'])){

    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);

		$sql = "DELETE FROM orders WHERE order_id = $order_id";

		if(mysqli_query($conn, $sql)){
      mail('$email_id','Order Delivered','TASTY-GRAB!!\nYOUR ORDER OF $order_id is Delivered Succesfully\n Thank you','FROM: official.tastygrab@yahoo.com');
            echo '<script>alert("Delivered Order");</script>';
			
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

    }
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/adminheader.php'); ?>

	<h4 class="center grey-text">ORDER DETAILS</h4>
    <div class="table-responsive">
<table>
    <thead>
    <tr>
      <th scope="col" width="20%">Customer email</th>
      <th scope="col" width="10%">Pizza Name</th>
      <th scope="col" width="20%">Address of Delivery</th>
      <th scope="col" width="10%">Quantity</th>
      <th scope="col" width="10%">Total Amount</th>
      <th scope="col" width="15%">Order time</th>
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
      <td width="20%"><h6><?php echo htmlspecialchars($pizza['email_id']); ?></h6></td>
      <td width="10%"><h6><?php echo htmlspecialchars($pizza['pizza_name']); ?></h6></td>
      <td width="20%"><h6><?php echo htmlspecialchars($pizza['area']); ?></h6></td>
      <td width="10%"><h6><?php echo htmlspecialchars($pizza['qty']); ?></h6></td>
      <td width="10%"><h6><?php echo htmlspecialchars($pizza['total']); ?></h6></td>
      <td width="15%"><h6><?php echo htmlspecialchars($pizza['time']); ?></h6></td>
    <td width ="15%"> <form action="adminpage.php" method="POST">
				<input type="hidden" name="order_id" value="<?php echo $pizza['order_id']; ?>">
        <input type="hidden" name="email_id" value="<?php echo $pizza['email_id']; ?>">
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