<?php
  session_start();
  if(empty($_SESSION["first_name"])) {
    header("Location: Login.php");
  }
?>
<?php 
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
    <title>Admin Page</title>
    <link rel="stylesheet" href="../stylings/Admin.css" />
    <!-- Boostrap CSS -->
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
    <!--Font Links-->
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
    <!--Font Links-->
  </head>
  <body>
    <!--Navigation Bar-->
    <?php
      include("navigationAdmin.php");
    ?>
    <!--Navigation Bar-->
    <main>
      <div class="container">
        <p class="title text-success mb-5">What would you like to do?</p>
        <div class="row gap-5 gap-lg-2">
          <div class="row">
            <div
              class="col-12 d-flex justify-content-between align-items-center"
            >
              <img
                class="img-fluid d-none d-lg-block"
                src="../assets/manageAuctions.svg"
              />
              <a href="ManageAuctions.html" class="btn btn-success link-btn"
                >Manage Auctions</a
              >
            </div>
          </div>
          <div class="row">
            <div
              class="col-12 d-flex justify-content-between align-items-center"
            >
              <img
                class="img-fluid d-none d-lg-block"
                src="../assets/manageUsers.svg"
              />
              <a href="ManageUsers.html" class="btn btn-success link-btn"
                >Manage Users</a
              >
            </div>
          </div>
          <div class="row">
            <div
              class="col-12 d-flex justify-content-between align-items-center"
            >
              <img
                class="img-fluid d-none d-lg-block"
                src="../assets/manageGuidelines.svg"
              />
              <a href="UpdateGuidelines.html" class="btn btn-success link-btn"
                >View/Update Pricing</a
              >
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
