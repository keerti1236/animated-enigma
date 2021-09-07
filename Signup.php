
<?php

include('config/db_connect.php');
$email = $name = $password = $area= $ph_no = '';
$errors = array('email' => '', 'name' => '', 'password' => '', 'area' =>'','ph_no' => '');

if(isset($_POST['submit'])){
    
    // check email
    if(empty($_POST['email'])){
        $errors['email'] = 'An email is required';
    } else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email must be a valid email address';
        }
    }

    // check name
    if(empty($_POST['name'])){
        $errors['name'] = 'A Name is required';
    } else{
        $name = $_POST['name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
            $errors['name'] = 'Name must be letters and spaces only';
        }
    }

    // check Password
    if(empty($_POST['password'])){
        $errors['password'] = 'Enter Password';
    } else{
        $password = $_POST['password'];
        if(!preg_match('/^[a-zA-Z\s0-9]+$/', $password)){
            $errors['password'] = 'Password must be letters and numbers';
        }
    }
    // check Area
    if(empty($_POST['area'])){
        $errors['area'] = 'Enter Area';
    } else{
        $area = $_POST['area'];
        if(!preg_match('/^[a-zA-Z\s0-9]+$/', $area)){
            $errors['area'] = 'area must be letters and numbers';
        }
    }
    //chech phone Number
    if(empty($_POST['ph_no'])){
        $errors['ph_no'] = 'An Phone Number is required';
    } else{
        $ph_no = $_POST['ph_no'];
        if(!preg_match('/^[0-9]+$/', $ph_no)){
            $errors['ph_no'] = 'Enter valid Phone Number';
        }
        
    }


    if(array_filter($errors)){
        //echo 'errors in form';
    } else { 
       include('config/db_connect.php');

        // escape sql chars
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $password = md5(mysqli_real_escape_string($conn, $_POST["password"]));
        $area = mysqli_real_escape_string($conn, $_POST['area']);
        $ph_no = mysqli_real_escape_string($conn, $_POST['ph_no']);
        // create sql
        $sql = "INSERT INTO user(user_name,email_id,ph_no,user_passwd,area) VALUES ('$name','$email','$ph_no','$password','$area') ";

        // save to db and check
        if(mysqli_query($conn, $sql)){
            // success
            header('Location: login1.php');
        } else {
            echo '<script>alert("Email Already Exist")</script>';
        }

    }
}

 // end POST check

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Sign up</h4>
    <form class="white" action="Signup.php" method="POST">
        <label>Your Email</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label>name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
        <div class="red-text"><?php echo $errors['password']; ?></div>
        <label>Area</label>
        <input type="text" name="area" value="<?php echo htmlspecialchars($area) ?>">
        <div class="red-text"><?php echo $errors['area']; ?></div>
        <label>Phone Number</label>
        <input type="text" name="ph_no" value="<?php echo htmlspecialchars($ph_no) ?>">
        <div class="red-text"><?php echo $errors['ph_no']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>

</html>