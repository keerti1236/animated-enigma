<?php
  session_start();
  $email = "";
  $password="";
  $errors = [];
  

	include('config/db_connect.php');

	$email = $password = '';
    $errors = array('email' => '', 'password' => '');
	if(isset($_POST['submit'])){
		
		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid ';
			}
		}

		// check password
		if(empty($_POST['password'])){
			$errors['[lpassword'] = 'A password is required';
		} 
		}

	    // check GET request id param

          if(array_filter($errors)){
            //echo 'errors in form';
        } else { 
           include('config/db_connect.php');
		

		// make sql
		$sql = "SELECT email_id,user_password FROM user WHERE email_id='$email' AND user_password='$password'";
          if(mysqli_query($conn, $sql)){
		 $result = mysqli_query($conn, $sql);
		 $pizza = mysqli_fetch_assoc($result);


		 // fetch result in array format
           
		  header('Location: menu.php');
        } 
        else{
           $errors['mail']="Invalid";
        }
    }
  


	 // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Login</h4>
		<form class="white" action="login.php" method="POST">
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" >
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Enter Password</label>
			<input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>">
			<div class="red-text"><?php echo $errors['password']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>

	</section>

	<?php include('templates/footer.php'); ?>
	

</html>
