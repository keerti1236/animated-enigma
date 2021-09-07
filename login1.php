<?php
//login.php
$email=$password="";
$errors = array('email' => '', 'password' => '');
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

    // check title
    if(empty($_POST['password'])){
        $errors['password'] = 'Password is required';
    } else{
        $title = $_POST['password'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
            $errors['password'] = 'Password Invalid';
        }
    }}

$connect = mysqli_connect("localhost", "KD", "12345676", "tasty-grab");
if(isset($_POST["email"]) && isset($_POST["password"]))
{
 $email = mysqli_real_escape_string($connect, $_POST["email"]);
 $password = md5(mysqli_real_escape_string($connect, $_POST["password"]));
 $sql = "SELECT * FROM user WHERE email_id = '".$email."' AND user_passwd = '".$password."'";
 $result = mysqli_query($connect, $sql);
 $num_row = mysqli_num_rows($result);
 if($num_row > 0)
 {  session_start();
  $data = mysqli_fetch_array($result);
  $_SESSION["email"] = $data["email"];
  $_SESSION['email'] =$email;
  header('Location: cart1.php');
 }
 else{
    echo '<script>alert("Invalid Inputs");</script>';
} 


}
?>

<!DOCTYPE html>
<html>
    
    <?php include('templates/header.php'); ?>
    <p hidden><a href="vieworders.php"></a></p>
    <section class="container grey-text">
        <h4 class="center">Login</h4>
        <form class="white" action="login1.php" method="POST">
            <label>Your Email</label>
            <input type="text" name="email" >
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label>Enter Password</label>
            <input type="password" name="password">
            <div class="red-text"><?php echo $errors['password']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>

</html>
