  
<?php 

// connect to the database
$conn = mysqli_connect('localhost', 'KD', '12345676', 'tasty-grab');

// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}

?>