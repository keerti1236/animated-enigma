<?php 
$feedback='';
$errors=array('feedback' =>'');
	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT * FROM feedback';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('adminheader.php'); ?>

	<h4 class="center grey-text">Customer Feedback</h4>

	<div class="container">
		<div class="row">

			<?php foreach($pizzas as $pizza): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['feedback']); ?></h6>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>