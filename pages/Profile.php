<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="../stylings/Profile.css" />
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
    <?php
      include("navigation.php");
    ?>
    <!--Navigation Bar-->
    <main class="container-fluid">
      <div class="row row-cols-1 row-cols-lg-2">
        <!--Image Container-->
        <div
          class="col d-flex flex-column align-items-center justify-content-center img-section"
        >
        <?php
        include("../database.php");
        $sql = "SELECT * from profileimg WHERE id='{$_SESSION['id']}';";
        $result = mysqli_query($conn, $sql);
        $rand = mt_rand();
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo "<img
            src='{$row['img_location']}'
            class='img-fluid rounded-circle'
            alt=''
            id='profile-pic'
            {$rand}
          />";
          }
        }
      ?>
          <label for="change-prof" class="md-title mt-5"
            >Change Profile Picture</label
          >
          <form action="<?php $_SERVER["PHP_SELF"] ?>" class="w-755" method="post"  enctype='multipart/form-data'>
            <div class="input-group">
              <input
                type="file"
                name="file"
                class="form-control bg-transparent"
                id="change-prof"
              />
              <button
                type="submit"
                class="btn btn-success"
                name="submit"
                id="save-img-btn"
                disabled
                onclick="saveProfPic()"
              >
                Save
              </button>
            </div>
            <!--Image Container-->
          </form>
        </div>
        <!--Information Container-->
        <div class="col d-flex flex-column align-items-center">
          <form action="<?php $_SERVER["PHP_SELF"] ?>" class="fs-5 information-section p-4" id="info-form" method="post">
            <p class="title text-light">Personal Information</p>
            <!--Name Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="name_inp"
                name="fullName"
                placeholder="<?php echo "{$_SESSION["first_name"]} {$_SESSION["last_name"]}" ?>"
                onchange="boom()"
                disabled
                <?php echo mt_rand(); ?>
              />
              <button
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("name_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </div>
            <!--Name Information-->

            <!--Email Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="email_inp"
                name="email"
                placeholder="<?php echo "{$_SESSION["email"]}" ?>"
                onchange="boom()"
                disabled
                <?php mt_rand() ?>
              />
              <button
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("email_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </div>
            <!--Email Information-->

            <!--Address Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="address_inp"
                placeholder="Balanti,Tarlac"
                onchange="boom()"
                disabled
              />
              <button
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("address_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </div>
            <!--Address Information-->

            <!--Mobile Number Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="mobileNum_inp"
                name="number"
                placeholder="<?php echo "{$_SESSION["phone_number"]}" ?>"
                onchange="boom()"
                disabled
                <?php mt_rand() ?>
              />
              <button
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("mobileNum_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </div>
            <!--Mobile Number Information-->
            <button
              type="submit"
              class="btn btn-success fs-1"
              id="save-btn"
              name="infoSave"
              disabled
            >
              Save
            </button>
          </form>
        </div>
        <!--Information Container-->
      </div>
    </main>
    <script src="../index.js"></script>
  </body>
</html>
<?php
  include("../database.php");
  if(isset($_POST["infoSave"])) {
    if(isset($_POST["fullName"])) {
      $name = $_POST["fullName"];
      $full_name = explode(" ", $name);
      $first_name = $full_name[0];
      $last_name = null;
      for($i = 1;$i<=count($full_name)-1;$i++) {
        $last_name = $last_name." ".$full_name[$i];
      }
      $last_nameFinal = trim($last_name);
      $sqlFirst = "UPDATE users SET first_name = '{$first_name}'  WHERE id='{$_SESSION['id']}';";
      $resultFirst = mysqli_query($conn, $sqlFirst);
      $sqlLast = "UPDATE users SET last_name = '{$last_nameFinal}'  WHERE id='{$_SESSION['id']}';";
      $resultLast = mysqli_query($conn, $sqlLast);
      $_SESSION["first_name"] = $first_name;
      $_SESSION["last_name"] = $last_nameFinal;
    }
    if(isset($_POST["email"])) {
      $email = $_POST["email"];
      $sqlEmail = "UPDATE users SET email = '{$email}'WHERE id=' {$_SESSION['id']}';";
      $resultEmail = mysqli_query($conn, $sqlEmail);
      $_SESSION["email"] = $email;
    }
    if(isset($_POST["number"])) {
      $number = $_POST["number"];
      $sqlNumber = "UPDATE users SET phone_number = '{$number}'WHERE id=' {$_SESSION['id']}';";
      $resultNumber = mysqli_query($conn, $sqlNumber);
      $_SESSION["phone_number"] = $number;
    }
    header("Location: Profile.php?Lezgo!");
    
  }
  
?>
<?php
include("../database.php");
  if(isset($_POST["submit"])) {
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
        if($fileSize < 500000) {
          $fileNameNew = "profile".$_SESSION['id'].".".$fileActualExt;
          $fileDestination = '../uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          $sqlLoc = "UPDATE profileimg SET img_location = '{$fileDestination}' WHERE id='{$_SESSION['id']}';";
          $resultLoc = mysqli_query($conn, $sqlLoc);
        }
        else {
          echo "Maximum file size exceeded!";
        }
      }
      else {
        echo "There was an error uploading your file!";
      }
    }
    else {
      echo "You cannot upload files of this type!";
    }
  }
?>