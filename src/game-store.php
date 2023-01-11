<?php

require_once('./connection.php');

$msg = ""; 

/* Insert Games */
if(isset($_POST['submit'])) {


  $game_name = $_POST['game-name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $pay_type = $_POST['pay-type'];

  // Image Handing
  $image = $_FILES['image']['name'];
  $tempname = $_FILES["image"]["tmp_name"];

  $folder = "image/".$image;

  $sql = "INSERT INTO game_store (game_name, price, category, pay_type, description, image) VALUES ('{$game_name}', '{$price}', '{$category}', '{$pay_type}', '{$description}', '{$image}')";

  $result = mysqli_query($conn, $sql);

  if ($result) {

    if (move_uploaded_file($tempname, $folder)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  } else {
    die(mysqli_error($con));
  }

}




/* Update Games */
if(isset($_POST['update'])) {

  $game_id = $_POST['game-id'];
  $game_name = $_POST['game-name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $pay_type = $_POST['pay-type'];

  $image = $_FILES['image']['name'];
  
  $sql = "";

  if ($image != null) {
    
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "image/".$image;

    $sql = "UPDATE game_store SET game_name='{$game_name}', price='{$price}', category='{$category}', pay_type='{$pay_type}', description='{$description}', image='{$image}' WHERE game_id='{$game_id}'";

  } else {
    $sql = "UPDATE game_store SET game_name='{$game_name}', price='{$price}', category='{$category}', pay_type='{$pay_type}', description='{$description}' WHERE game_id='{$game_id}'";
  }

  $result = mysqli_query($conn, $sql);

  if ($result) {
  } else {
    die(mysqli_error($con));
  }

}



?>

<!-- -------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- External CSS -->
    <link rel="stylesheet" href="./styles/game-store.css">

    <title>Game Store</title>
</head>
<body>

<div class="container mt-5 admin-form-body border pt-4 pb-4">

  <div class="top-bar row mb-5">
    <div class="admin-body-title col-md-8"><h2>ADD A NEW GAME</h2></div>
    <div class="col-md-4">
      <button type="button" class="btn btn-info" onClick="myFunction()">View All Game Records</button>
      <script>
        function myFunction() {
          window.location.href="./game-table.php";
        }
      </script>
  </div>
  </div>

  <form action="game-store.php" method="post" enctype="multipart/form-data">

    <input type="hidden" id="game-id" name="game-id">

    <div class="form-group">
      <label for="game-name">Game Name</label>
      <input type="text" class="form-control" id="game-name" name="game-name" placeholder="Game Name">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description"></textarea>
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-5">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Price">
      </div>

      <div class="form-group col-md-4">
        <label for="category">Category</label>
        <select id="category" name="category" class="form-control">
          <option selected disabled>Choose a category</option>
          <option value="1">1 - Puzzel</option>
          <option value="2">2 - Maths & English</option>
          <option value="3">3 - Art & Colour</option>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="pay-type">Paid or Free</label>
        <select id="pay-type" name="pay-type" class="form-control">
          <option value="free">1 - Free</option>
          <option value="paid">2 - Paid</option>
        </select>
      </div>
    </div>

      <div class="form-group col-md-12 mt-3">
        <input type="file" name="image" id="fileToUpload" class="col-md-12">
      </div>

    <div class="button-group mt-5 ml-3">
      <!-- <button type="submit" name="submit" class="btn btn-success">ADD A GAME</button> -->
      <input type="submit" id="insert-form" class="btn btn-success mr-3" name="submit" value="ADD A GAME" >
      <input type="submit" id="update-form" class="btn btn-primary" name="update" value="UPDATE" hidden="hidden">
      <button type="reset" class="btn btn-secondary">RESET</button>
    </div>
    

  </form>

</div>


<!-- Update Request Handling -->
<?php

  if(isset($_GET['update-req-id'])) {
    
    $id = $_GET['update-req-id'];

    $sql = "SELECT * FROM game_store WHERE game_id='{$id}'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {

      echo "
        <script>
            document.getElementById('game-id').setAttribute('value', '{$row['game_id']}');
            document.getElementById('game-name').value = '{$row['game_name']}';
            document.getElementById('description').innerHTML = '{$row['description']}';
            document.getElementById('price').value = '{$row['price']}';
            document.getElementById('category').value = '{$row['category']}';
            document.getElementById('pay-type').value = '{$row['pay_type']}';

            document.getElementById('update-form').removeAttribute('hidden');
            document.getElementById('insert-form').setAttribute('hidden', 'hidden');
        </script>
      ";

    } 

  }
    
?>


<!-- Closing Connection with Server -->
<?php
  mysqli_close($conn); 
?>


</body>
</html>
