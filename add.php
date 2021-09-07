<?php

	include('config/db_connect.php');
    $pizza_name = '';
    $cost = '';
    $valid='';
	$errors = array('pizza_name' => '', 'cost' => '');

	if(isset($_POST['submit'])){

        // check title
		if(empty($_POST['pizza_name'])){
			$errors['pizza_name'] = 'Add Pizza Name';
		} else{
			$pizza_name = $_POST['pizza_name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $pizza_name)){
				$errors['pizza_name'] = 'Pizza name must be a letters';
			}
		}

		// check ingredients
		if(empty($_POST['cost'])){
			$errors['cost'] = 'cost must be a number';
		} else{
			$cost = $_POST['cost'];
			if(!preg_match('/^[0-9]+$/', $cost)){
				$errors['cost'] = 'cost must be a number';
			}
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$pizza_name = mysqli_real_escape_string($conn, $_POST['pizza_name']);
			$cost = mysqli_real_escape_string($conn, $_POST['cost']);

			// create sql
			$sql = "INSERT INTO pizza(pizza_name,cost) VALUES('$pizza_name','$cost')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
                header('Location: admin.php');

			} else {
                $valid='Pizza Already exits';
                $errors['pizza_name']=$valid;
			}
			
		}

	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/adminheader.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add a Pizza</h4>
		<form class="white" action="add.php" method="POST">
			<label>Pizza Name</label>
			<input type="text" name="pizza_name" value="<?php echo htmlspecialchars($pizza_name) ?>">
			<div class="red-text"><?php echo $errors['pizza_name']; ?></div>
			<label>cost</label>
			<input type="text" name="cost" value="<?php echo htmlspecialchars($cost) ?>">
			<div class="red-text"><?php echo $errors['cost']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>