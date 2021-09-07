<?php
    include('config/db_connect.php');
    $feedback='';
    $errors = array('feedback' => '');
if(isset($_POST['submit'])){
    if(empty($_POST['feedback'])){
        $errors['feedback'] = 'Entry is required';
    } else{
        $feedback = $_POST['feedback'];
        if(!preg_match('/^[a-zA-Z0-9\s]+$/', $feedback)){
            $errors['feedback'] = 'Enter valid Entries';
        }
    }
    if(array_filter($errors)){

    }
    else{
        $sql="INSERT INTO `feedback` (`feedback`) VALUES ('$feedback') ";
        if(mysqli_query($conn, $sql)){
            // success
            echo '<script>alert("Thanks for Your Fedback")</script>';
            header('Location:cart1.php');
        }
    }
    
}
?>
<!DOCTYPE html>
<head>   <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>Feedback</title>
    <style>
    #div{
        position: relative;
        margin-left: auto;
        margin-right: auto;
        width: 80%;
        height: 650px;  
        border: 2px solid rgba(12, 12, 12, 0.8); 
        background-image: url(images/fb1.jpg);
        background-position:center;
        background-repeat: no-repeat;
        border-spacing: 0px 0px 30px;
        background-size: cover; 
        }
        #hu{
            position: relative;
            height: 300px;
        }
        #bk{
            position: relative;
            height: 500px;
            left: 550px;
        }
    </style>    
</head>

<body>
<div id='div'>
    <div id="divf">
    <form action="feedback.php" method="POST">
        <table align="center"id="hu">
            <tr >
            <td><h2>Feedback</h2></td>
            <td>
                <textarea name="feedback" cols="45" rows="5"></textarea>
                <div class="red-text"><?php echo $errors['feedback']; ?></div>

            </td>
            </tr>
            <tr>
                <td align="center" colspan="2" >
                <input type="submit" name="submit" value="Submit" />

                <input type="reset" name="reset"  value="Reset"  />
            </td>
             </tr>
        </table>
    
    </form>
    <h3 id='bk'><a href="cart1.php"><strong>Back</strong></a></h3>
    </div>
</div>
</body>