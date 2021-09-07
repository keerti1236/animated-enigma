<?php 

	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT order_id,email_id,user_name,ph_no,area,pizza_name,qty,total,order_time FROM order_pizza';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$order_pizza = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('adminheader.php'); ?>

	<h4 class="center grey-text">ORDERS</h4>

	<div class="container">
		<div class="row">

			<?php foreach($order_pizzas as $order): ?>

				<div class="col s6 m4">
						<div class="card-content center">
                            <h6><?php echo htmlspecialchars($order['oredr_id']); ?></h6>
                            <h6><?php echo htmlspecialchars($order['email_id']); ?></h6>
                            <h6><?php echo htmlspecialchars($order['user_name']); ?></h6>
							<ul class="grey-text">
								<?php foreach(explode(',', $pizza['cost']) as $ing): ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
                                <?php endforeach; ?>
                                <ul id="nav-mobile" class="right hide-on-small-and-down">
                            <li><a href="cart.php" class="btn brand z-depth-0"><input type="button" value="Buy"></a></li>
                            </ul>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $pizza['id'] ?>">more info</a>
                        

                         </div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>