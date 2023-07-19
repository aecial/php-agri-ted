<?php
  session_start();
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
    <title>Login</title>
    <link rel="stylesheet" href="../stylings/Login.css" />
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
  </head>
  <body>
    <main class="container bg-body-tertiary p-5 login_cont">
      <!--Image Container-->
      <div class="row">
        <div class="col d-none d-lg-block my-auto">
          <img
            class="img-fluid"
            src="../assets/login2.svg"
            alt="Login Pic"
            lazy
          />
        </div>
        <!--Form Container-->
        <div class="col mx-auto">
          <h1 class="form-label text-center">Login</h1>
          <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            <div class="form-floating">
              <input
                type="email"
                class="form-control mb-3"
                id="email-inp"
                name="email"
                placeholder="Enter Email here"
              />
              <label for="email-inp">Email</label>
            </div>
            <div class="form-floating">
              <input
                type="password"
                name="password"
                class="form-control mb-3"
                id="pass-inp"
                placeholder="Enter Password here"
              />
              <label for="pass-inp">Password</label>
            </div>
            <button type="submit" name="login" class="btn btn-success w-100 mb-3">
              Submit
            </button>
          </form>
          <small
            >Don't have an account? <a href="SignUp.html">Sign Up</a></small
          >
        </div>
        <!--Form Container-->
      </div>
    </main>
    <script src="../index.js"></script>
  </body>
</html>
<?php

  include("../database.php");
  if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)  {
      while($row = mysqli_fetch_assoc($result)) {
        if($row["password"] == $password){
          $_SESSION["id"] = $row["id"];
          $_SESSION["first_name"] = $row["first_name"];
          $_SESSION["last_name"] = $row["last_name"];
          $_SESSION["email"] = $row["email"];
          $_SESSION["phone_number"] = $row["phone_number"];
          if($row["type"] == 1 || $row["type"] == 2) {
            header("Location: AuctionPage.php");
          }
          else {
            header("Location: Admin.php");
          }
        }
        else {
          header("Location: Login.php");
        }
        
      }
      
  
    }
    else {
      echo "<h1>User Not Found!</h1>";
    }
    mysqli_close($conn);
  }
  
  
?>