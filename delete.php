<? php 

include('config/db_connect.php');
$pizza_name = $cost='' ;
$pizza=array('pizza_name'=>'','cost'=>'');

if(isset($_POST['delete'])){

  $id_to_delete = mysqli_real_escape_string($conn, $_POST['pizza_name']);

  $sql = "DELETE FROM pizza WHERE pizza_name = $pizza_name";

  if(mysqli_query($conn, $sql)){
    header('Location: admin.php');
  } else {
    echo 'query error: '. mysqli_error($conn);
  }

}


?>

<!DOCTYPE html>
<html>

<?php include('templates/adminheader.php'); ?>

<div class="container center">

    <!-- DELETE FORM -->
    <form action="delete.php" method="POST">
      <input type="text" name="pizza_name" value="<?php echo $pizza['pizza_name']; ?>">
      <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    </form>

 
</div>

<?php include('templates/footer.php'); ?>

</html>
</html>