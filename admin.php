<?php
  
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
			$errors['password'] = 'A password is required';
        } 
        if($_POST['email']==='dvpk511@gmail.com' && $_POST['password']==='Az10'){
            header('Location: adminpage.php');
        }
        else{
            echo '<script>alert("Invalid Entities")</script>';
        }


        }
        
        ?>
        <!DOCTYPE html>
        <html>
            
            <?php include('templates/header.php'); ?>
        
            <section class="container grey-text">
                <h4 class="center">AdminLogin</h4>
                <form class="white" action="admin.php" method="POST">
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
        