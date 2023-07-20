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
    <title>Create New Auction</title>
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
    <link rel="stylesheet" href="../stylings/createAuction.css" />
    <script
      src="https://kit.fontawesome.com/fae056ab45.js"
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
    <nav
      class="navbar nav-underline sticky-lg-top navbar-expand-xxl bg-body-tertiary"
    >
      <div class="container-fluid">
        <a
          class="navbar-brand d-flex align-items-center text-success"
          id="brand"
          href="#"
          ><img src="../assets/logo-nobg.png" class="img-fluid logo-pic" />
          <p class="title">Agrikultur'App</p></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon fs-1"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul
            class="navbar-nav ms-auto mb-2 mb-lg-0 text-end d-flex align-items-xxl-center"
          >
            <li class="nav-item me-2">
              <a
                class="nav-link active text-success"
                id="nav-link"
                aria-current="page"
                href="AuctionPage.html"
                ><i class="fa-solid fa-gavel"></i> Auction Page</a
              >
            </li>
            <li class="nav-item d-block d-xxl-none">
              <a
                class="nav-link text-success"
                href="Notifications.html"
                id="nav-link"
                ><i class="fa-solid fa-bell"></i> Notifications</a
              >
            </li>
            <li class="nav-item me-2">
              <a
                class="nav-link text-success"
                href="Guidelines.html"
                id="nav-link"
                ><i class="fa-solid fa-table"></i> Pricing Guidelines</a
              >
            </li>
            <li class="nav-item">
              <p class="desc text-end d-block d-xxl-none">
                Logged In as:
                <strong
                  ><a
                    href="Profile.html"
                    class="nav-link text-success text-decoration-underline"
                    >Teddy Pascual</a
                  ></strong
                >
              </p>
            </li>

            <li class="nav-item me-2">
              <a
                class="btn btn-success w-auto fs-3 d-block d-xxl-none float-end"
                href="../pages/Login.html"
                >Sign Out</a
              >
            </li>
          </ul>
          <div class="nav-pic d-none d-xxl-block btn-group dropdown">
            <button
              type="button"
              class="btn dropdown-toggle"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img
                src="../assets/avatar1.svg"
                class="img-fluid rounded-circle"
              />
            </button>
            <div
              class="dropdown-menu fs-3"
              id="dropdown-menu"
              aria-labelledby="dropdownMenuButton"
            >
              <a class="dropdown-item text-success" href="Profile.html"
                ><i class="fa-solid fa-user"></i> Profile</a
              >
              <a class="dropdown-item text-success" href="#"
                ><i class="fa-solid fa-bell"></i> Notifications</a
              >
              <div class="dropdown-divider"></div>
              <a class="btn btn-success w-100 fs-3" href="../pages/Login.html"
                ><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a
              >
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!--Navigation Bar-->

    <!--Create Form Section-->
    <section class="container-fluid create-form-section">
      <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center">
          <div class="card mt-5 form-card">
            <div class="card-body">
              <form class="d-flex flex-column" id="createForm" action="<?php $_SERVER["PHP_SELF"] ?>" method="post" enctype='multipart/form-data'>
                <!--Select Input-->
                <select
                  id="crop_category"
                  class="form-select mb-2 fs-1 bg-transparent text-light"
                  aria-label="Default select example"
                  name="crop_type"
                  required
                >
                  <option
                    value="0"
                    class="bg-body-tertiary"
                    selected
                    disabled
                  >
                    Choose a Crop Type
                  </option>
                  <option value="1" class="bg-success text-light">
                    Ampalaya
                  </option>
                  <option value="2" class="bg-success text-light">
                    Kalabasa
                  </option>
                  <option value="3" class="bg-success text-light">
                    Kamatis
                  </option>
                  <option value="4" class="bg-success text-light">Okra</option>
                  <option value="5" class="bg-success text-light">
                    Sigarilyas
                  </option>
                  <option value="6" class="bg-success text-light">Sitaw</option>
                </select>
                <!--Select Input-->

                <!--Price Input-->
                <div class="input-group mb-3">
                  <span
                    id="peso-sign"
                    class="input-group-text fs-1 bg-success text-light"
                    >₱</span
                  >
                  <input
                    onkeyup="btnDis()"
                    id="crop_price"
                    type="number"
                    name="base_price"
                    class="form-control fs-1 bg-transparent text-light"
                    placeholder="Crop Price"
                    aria-label="Price"
                    required
                  />
                </div>
                <!--Price Input-->

                <!--Volume Input-->
                <div class="input-group mb-3 bg-transparent">
                  <span class="input-group-text fs-1 bg-success text-light"
                    >Kg:
                  </span>
                  <input
                    onkeyup="btnDis()"
                    id="crop_volume"
                    type="number"
                    name="volume"
                    class="form-control fs-1 bg-transparent text-light"
                    placeholder="Crop Volume"
                    aria-label="Volume"
                    required
                  />
                </div>
                <!--Volume Input-->

                <!--Picture Input-->
                <label for="crop_picture" class="text-light md-title"
                  >Upload Picture of your Produce</label
                >
                <div class="input-group mb-3 bg-transparent">
                  <input
                    onkeyup="btnDis()"
                    id="crop_picture"
                    type="file"
                    name="file"
                    class="form-control fs-1 bg-transparent text-light"
                    placeholder="Picture"
                    aria-label="Picture"
                    required
                  />
                </div>
                <!--Picture Input-->

                <div class="d-flex justify-content-between mt-3">
                  <!--Utility Buttons-->
                  <a
                    id="back-btn"
                    class="btn text-light bg-transparent align-self-end w-50 fs-1"
                    href="javascript:history.back()"
                  >
                    Back
                  </a>
                  <button
                    id="form-btn"
                    onclick="confirmSubmit()"
                    class="btn btn-success align-self-end w-50 fs-1"
                    name="submit"
                  >
                    Submit
                  </button>
                  <!--Utility Buttons-->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Create Form Section-->
  </body>
</html>
<?php
  if(isset($_POST["submit"])) {
    if($_POST["crop_type"] == 0) {
      echo "<script>alert('Please choose a crop type')</script>";
    }
    else{
      $owner = "{$_SESSION["first_name"]} {$_SESSION["last_name"]}";
      $crop_type = $_POST["crop_type"];
      $base_price = $_POST["base_price"];
      $volume = $_POST["volume"];
      include("../database.php");

      //file upload
      $file = $_FILES['file'];

      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSize = $_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];
      $fileType = $_FILES['file']['type'];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png', 'pdf');

      if(in_array($fileActualExt, $allowed)) {
        if($fileError === 0) {
          if($fileSize < 1000000) {
            $rand = mt_rand();
            $fileNameNew = "auctionBy".$_SESSION['id']."-{$rand}".".".$fileActualExt;
            $fileDestination = '../auctions/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
          }
          else {
            echo "Maximum file size exceeded!";
          }
        }
        else {
          echo "There was an error uploading your file!";
        }
      }



      $sql = "INSERT INTO auctions (owner, crop_type, base_price, volume, img_location) VALUES ('$owner', '$crop_type', '$base_price', '$volume', '$fileDestination')";
      mysqli_query($conn, $sql);
    
      mysqli_close($conn);
    }
    
  }
?>