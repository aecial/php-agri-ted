<?php
  session_start();
  if(empty($_SESSION["first_name"])) {
    header("Location: Login.php");
  }
  if(isset($_POST["signout"])) {
    session_destroy();
    header("Location: http://localhost/agri/pages/Login.php"); 
    exit();
    echo "<h1>You have logged out!</h1>";
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kamatis Auctions</title>
    <link rel="stylesheet" href="../stylings/listings.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/fae056ab45.js"
      crossorigin="anonymous"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!--Navigation Bar-->
    <?php
      include("navigation.php");
    ?>
    <!--Navigation Bar-->
    <p class="title text-center mt-5 mb-5">
      Welcome to the <span class="text-success">Kamatis Auctions</span>
    </p>
    <div class="container-fluid d-flex justify-content-between">
      <span></span>
      <a
        href="CreateAuctionPage.php"
        class="btn btn-success text-success mb-4 create-new-btn"
      >
        <p class="md-title new-text-btn">
          <i class="fa-regular fa-square-plus"></i> Create New Auction
        </p>
      </a>
    </div>

    <section
      class="offered-produce container-fluid p-5 d-flex justify-content-center justify-content-lg-start"
      id="offered"
    >
      <div
        class="desktop-view flex-wrap d-flex flex-column flex-lg-row justify-content-center justify-content-lg-start gap-5"
      >
      <?php
      include("../database.php");
      $sql = "SELECT * FROM auctions";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
          if($row["crop_type"] == 3){
            echo '
          <div class="card" style="width: 18rem">
          <img src="'.$row["img_location"].'" class="card-img-top" alt="" />
          <div class="card-body">
            <h5 class="card-title md-title">Farmer:'.$row["owner"].'</h5>
            <div class="card-text">
              <p class="fs-2">Volume:'.$row["volume"].' </p>
              <p class="fs-2">Base Bid Price:'.$row["base_price"].'</p>
              <p class="fs-2 highlight-text">Latest Bid Price: '.$row["latest_price"].'</p>
            </div>
            <a href="'.$row["auc_location"].'" class="btn btn-success fs-1 w-50">Bid</a>
          </div>
        </div>
          ';
          }

        }
        
      }
      else {
          echo '<p class="title text-center text-light">There are no currently active listings!</p>';
      }
    ?>
      </div>
    </section>
  </body>
</html>
