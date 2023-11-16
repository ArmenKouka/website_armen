<?php
  include("connection.php");
  $sql = "SELECT * FROM  products";
  $all_products = $con->query($sql);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnMor</title>
    <link rel="icon" type="image/png" href="img/favicon.png" >
    <link rel="stylesheet" href="style/Products.css">
    <link rel="stylesheet" href="style/general.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!---ICONS-->
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/shopping-bag.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/search.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/menu.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/close.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/arrow-right.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/chevron-up.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/shopping-cart.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/remove-r.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



   <!-----Fonts-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Libre+Baskerville&family=Monoton&display=swap" rel="stylesheet">
   
</head>
<body>
    

    <!----------HEADER----->
    <header id="header">
        <a href="index.html" class="logo"><img src="img/logo.png" alt=""></a>
     
      <ul class="navmenu">
        <li><a href="index.html">Home</a></li>
        <li><a class="active" href="Products.php">Products</a></li>
        <li><a href="about.html">About us</a></li>
      </ul>

      <div  class="nav-icon">
        <div id="search_text" class="search">
          <input type="text"  placeholder="Search">
        </div>
        <a><i onclick="search()" id="searchbtn" class="gg-search"></i></a>
        <a id="iconBag" class="icons" > <i id="dot" class="fa-solid fa-circle"></i> <i class="gg-shopping-bag" id="bag-ickon"></i></a>
        <!--Cart-->
        <div class="cart">
        </div>
        <i class="gg-close" id="close-cart"></i>

        <a id="iconProfile" class="icons"><i  onclick="poplogin()" class="gg-profile"></i></a>
        <div  id="menu-icon">
          <i  class="gg-menu"></i>
        </div>
      
      </div>
    </header>


    <!---HEADER BANNER--->
    <div onclick="scrollUp()"  id="scroll-up">
      <a><i class="gg-chevron-up"></i></a>
    </div> 

      <section id="banner-background">
        <div id="shop-banner">
          <h1>UP TO 70% OFF</h1>
        </div>
      </section>

<!--REGISTRATION----->
<div class="fullscreen-container">
</div>
  <div id=response></div>







 <!----Products----->
 <div class="small-container">
    <div class="row">
      <?php
      
        while($row = mysqli_fetch_assoc($all_products)){
      ?>

            <div class="colum">
              <form action="sproduct.php" method="GET">
                <button id="product_btn" name="id" value="<?php echo $row["product_id"]?>">
                  <div class="box">
                    <a><img src="<?php echo $row["product_image"]?>" alt=""></a>
                  </div>
               </button>

                  <div class="text_pr">
                    <h4><?php echo $row["product_name"]?></h4>
                    <i class="fa-regular fa-heart"></i>
                  </div>
                    <p>$<?php echo $row["price"]?></p>
              </form>
            </div>
        <?php } ?>
    </div>
 </div>



<!--Footer-->
<footer class="section-p1">
          <div class="col">
            <h2>Contact</h2>
            <div class="contact">
              <h4><span>Address:</span> 563 Wellington Road</h4>
              <h4><span>Phone:</span> +01 2222 365</h4>
              <h4><span>Hours:</span> 10:00 - 18:00, Mon - Sat</h4>
            </div>

            <div class="follow">
              <p>Follow us</p>
              <div class="icon">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-brands fa-tiktok"></a>                
                <a href="#" class="fa fa-youtube"></a>
              </div>
            </div>
          </div>
          <div class="col">
            <h2>About</h2>
            <div class="space">
              <a href="about.html">About us</a>
              <a href="#">Privacy Policy</a>
              <a href="#">Terms & Conditions</a>
              <a href="#">Contact us</a>
            </div>
          </div>
          <div class="col">
            <h2>My acount</h2>
            <div class="space">
            <a onclick="poplogin()" style="cursor: pointer;">Sign in</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
            </div>
          </div>
          <div class="col">
            <p>Secured Payment Gatewayes</p>
            <img src="img/pay/pay.png" alt="">
          </div>
  </footer>
    <p id="copurights">&copy; 2023 EnMor. All rights reserved.</p>

  </div>
  </div>
  
    <script src="script.js"></script>
    <script src="cart.js"></script>
    <script src="registration_view.js"></script>



</body>

</html>