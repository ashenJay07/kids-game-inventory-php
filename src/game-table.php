<?php

    require_once('./connection.php');

    $sql = "";

    /* Insert Games */
    if(isset($_GET['delete'])) {

        $game_id = $_GET['delete'];
        
        $sql = "DELETE FROM game_store WHERE game_id='$game_id'";
    
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
        } else {
            die(mysqli_error($con));
        }
    
    }

    $sql = "SELECT * FROM game_store";
    $result = mysqli_query($conn, $sql);

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- External CSS -->
    <link rel="stylesheet" href="./styles/game-store.css">
    <link rel="stylesheet" href="./styles/syl.css">

    <title>Game Store</title>
</head>
<body>

<div class="container mt-5 admin-form-body border pt-4 pb-4">

    <div class="top-bar row mb-5">
        <div class="admin-body-title col-md-8"><h2>GAME TABLE</h2></div>
        <div class="col-md-4">
            <button type="button" class="btn btn-info" onClick="myFunction()">Add a New Game</button>
            <script>
            function myFunction() {
                window.location.href="./game-store.php";
            }
            </script>
        </div>
    </div>

    <div class="table-responsive game-table">
        
    <table class="table table-striped table-bordered game-table">
        <thead>
            <tr>
                <th scope="col" class="sml">Game ID</th>
                <th scope="col">Game Name</th>
                <th scope="col">Price</th>
                <th scope="col" class="sml">Category</th>
                <th scope="col" class="sml">Pay-Type</th>
                <th scope="col" class="lngx">Description</th>
                <th scope="col">Image</th>
                <th scope="col" class="lng">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php 

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td>{$row['game_id']}</td>";
                        echo "<td>{$row['game_name']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td>{$row['category']}</td>";
                        echo "<td>{$row['pay_type']}</td>";
                        echo "<td>{$row['description']}</td>";
                        echo "<td>{$row['image']}</td>";
                        echo "<td class='pt-4'>
                            <button type='button' class='btn btn-primary mr-2' onClick='updateReq({$row['game_id']})'>Update</button>
                            <button type='button' class='btn btn-danger' onClick='deleteReq({$row['game_id']})'>Delete</button>
                        </td>";
                    echo "</tr>";

                }
            ?>

            <script>
                function updateReq(id) {
                    window.location.href="./game-store.php?update-req-id=" + id;
                }

                function deleteReq(id) {
                    window.location.href="./game-table.php?delete=" + id;
                }
            </script>

        </tbody>
    </table>

    </div>

</div>

<!-- Closing Connection with Server -->
<?php
  mysqli_close($conn); 
?>


</body>
</html>
