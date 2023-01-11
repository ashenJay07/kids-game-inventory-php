<?php

   require_once('./connection.php');

   if(isset($_GET['category'])) {

      $category = $_GET['category'];

      if ($category == '*') {
         $sql_free = "SELECT * FROM game_store WHERE pay_type='free' ORDER BY game_id DESC";
         $sql_paid = "SELECT * FROM game_store WHERE pay_type='paid' ORDER BY game_id DESC";
      } else {
         $sql_free = "SELECT * FROM game_store WHERE category='$category' AND pay_type='free' ORDER BY game_id DESC";
         $sql_paid = "SELECT * FROM game_store WHERE category='$category' AND pay_type='paid' ORDER BY game_id DESC";
      }

   } else {
      $sql_free = "SELECT * FROM game_store WHERE pay_type='free' ORDER BY game_id DESC";
      $sql_paid = "SELECT * FROM game_store WHERE pay_type='paid' ORDER BY game_id DESC";
   }

   $result_free = mysqli_query($conn, $sql_free);
   $result_paid = mysqli_query($conn, $sql_paid);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">

	<title>KIDSHERO</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!---.CSS--->
	<link rel="stylesheet" type="text/css" href="styles/syl.css">
	<link rel="stylesheet" type="text/css" href="styles/game-store.css">
	<link rel="stylesheet" type="text/css" href="styles/games.css">
	
	
	<script src="js/script.js"></script>

</head>
<body>

		
		
<!---HEADER SECTION-->
<div class="header-section com-cont">
   <table class="tab1" border="2" width="100%">

		<tr>
		<th>
			<img class="Logo" src="img/logo.jpg"width="50px"height="50px" align="left">

				<p>KIDHERO</p>
				<a class="set1" href="#">Home</a>
				<a class="set2" href="game.html">Game Upload</a>
				<a class="set3" href="news.html">News</a>
				<a class="set4" href="rewards.html">Rewards</a>
				<a class="set5" href="profile.html">Profile</a>
				<a class="set6" href="user.html"><img src="img/user.jpg"width="25px"height="25px"></a>
				<a class="set7" href="cart.html"><img src="img/cart1.jpg"width="25px"height="25px"></a>

		</th>
		</tr>
   </table>
</div>

<!---------------------------------------------------- BODY SECTION ---------------------------------------------------------->

<!--  style="background-color: red;" -->

<div class="body-content container mt-3">

   <div class="ctrl-bar d-flex col-md-12 row px-4">
      <div class="pop-game-btn d-flex align-items-center col-md-3">
         <button type="button" class="btn btn-dark col-md-12" onClick="redirectTo()">Popular Games</button> 
            <script>
               function redirectTo() {
               window.location.href="#popular-game-file.php";
               }
            </script>
      </div>
   
   
      <div class="sort-panel col-md-9 d-flex flex-row-reverse">
         
         <div class="paid-section col-md-3">
         
            <form class="form-inline">
               <select class="custom-select my-1 mr-sm-2" id="payType" onchange="getPType()">
                 <option value="free">Free</option>
                 <option value="paid">Paid</option>
               </select>
            </form>
         
            <script>
               function getPType() {
                  var catg = document.getElementById("payType").value;

                  if(catg == "free") {
                     window.location.href="#free-title";
                  } else if(catg == "paid") {
                     window.location.href="#paid-title";
                  }
                  
               }
            </script>

         </div>

         <div class="free-section col-md-3">
         
            <form class="form-inline">
               <select class="custom-select my-1 mr-sm-2" id="category" onchange="getGames()">
                 <option value="*">All</option>
                 <option value="1">Puzzel</option>
                 <option value="2">Maths & English</option>
                 <option value="3">Art & Colour</option>
               </select>
            </form>

            <script>
               function getGames() {
                  var catg = document.getElementById("category").value;
                  window.location.href="?category=" + catg;
               }
            </script>
         
         
         </div>


      </div>
   </div>

   <div class="free-title col-md-12 pl-4 pt-2 pb-1 mt-4" id="free-title"><h3>FREE GAMES</h3></div>

   <div class="free-game-section row border mt-3">

      <div class="text-center col-12 font-weight-bold free-empty"><p id="free-empty" class="mt-3">NO RECORDS EXISTS</p></div>

      <?php 

         while($row = mysqli_fetch_assoc($result_free)) {
               echo "
                  <script>
                        document.getElementById('free-empty').setAttribute('hidden', 'hidden');
                  </script>
               ";

      ?>
            

            <div class="game-container col-md-4 px-4 pt-3">
               <div class="game-card">
                  <div style="min-height: 240px;" class="d-flex">
                     <img src="image/<?php echo "{$row['image']}" ?>" alt="" style="width:100%; max-height: 240px;">
                  </div>
                  
                  <h1 class="mt-3"><?php echo "{$row['game_name']}" ?></h1>
                  <div class="px-3" style="min-height: 130px !important;">
                     <p class="text-left"><?php echo "{$row['description']}" ?></p>
                  </div>
                  <a href="#"><button href="#">Add to Cart</button></a>
               </div>
            </div>

      <?php

         }

      ?>

   </div>


   <div class="paid-title col-md-12 pl-4 pt-2 pb-1 mt-4" id="paid-title"><h3>PAID GAMES</h3></div>

   <div class="paid-game-section row border mt-3 mb-5">

      <div class="text-center col-12 font-weight-bold paid-empty"><p id="paid-empty" class="mt-3">NO RECORDS EXISTS</p></div>

      <?php 

         while($row = mysqli_fetch_assoc($result_paid)) {
               echo "
                  <script>
                        document.getElementById('paid-empty').setAttribute('hidden', 'hidden');
                  </script>
               ";

      ?>
         

      <div class="game-container col-md-4 px-4 pt-3">
         <div class="game-card">
            <div style="min-height: 240px;" class="d-flex">
               <img src="image/<?php echo "{$row['image']}" ?>" alt="" style="width:100%; max-height:240px;">
            </div>

            <h1 class="mt-3"><?php echo "{$row['game_name']}" ?></h1>
            <p class="price">LKR <?php echo "{$row['price']}" ?></p>
            <div class="px-3" style="min-height: 130px !important;">
               <p class="text-left"><?php echo "{$row['description']}" ?></p>
            </div>
            <a href="#"><button href="#">Add to Cart</button></a>
         </div>
      </div>

      <?php

         }

      ?>


   </div>
   


   
</div>



<!-------------------------------------------------------FOOTER--------------------------------------------------------------->

<footer class="com-cont">
   <div class="footer-top">
     <div class="footer-top-body footer-flex">
       <div class="contact-body footer-body-div">
         <h3>Contant Us</h3>
         <p>+94 705523653</p>
       </div>
       <div class="email-body footer-body-div">
         <h3>Email</h3>
         <p>learning@gmail.com</p>
       </div>
       <div class="follow-us-body footer-body-div">
         <h3>Follow Us</h3><br>
         <div class="footer-social-media">
           <a href="#facebook" class="fa fa-facebook-official"></a>
           <a href="#twitter" class="fa fa-twitter-square"></a>
           <a href="#instagram" class="fa fa-instagram"></a>
           <a href="#google-plus" class="fa fa-google-plus-square"></a>
         </div>
       </div>
     </div>
   </div>
 
   <div class="footer-bottom">
     <div class="footer-bottom-body footer-flex">
       <div class="privacy-policy footer-body-div"><a href="#privacy-policy">Privacy Policy</a></div>
       <div class="help footer-body-div"><a href="#help">Help</a></div>
       <div class="about footer-body-div"><a href="#about">About</a></div>
     </div>
   </div>
 </footer>

 <?php
 
   if(isset($_GET['category'])) {

      $category = $_GET['category'];

      if(($category) == '*') {
         echo "1";
         echo "<script>document.getElementById('category').value = '*';</script>";
      } else if(($category) == '1') {
         echo "2";
         echo "<script>document.getElementById('category').value = '1';</script>";
      } else if(($category) == '2') {
         echo "<script>document.getElementById('category').value = '2';</script>";
      } else if(($category) == '3') {
         echo "<script>document.getElementById('category').value = '3';</script>";
      }
   }
 
 ?>


</body>
</html>