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
    <?php
    include("navigation.php");
    ?>
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
      $auctionDestination = "../auctionPages/{$rand}.php";
      $myFile = fopen($auctionDestination, "w");
      $content = "<?php
      session_start();
    ?>
    <!DOCTYPE html>
    <html lang='en'>
      <head>
        
        <meta charset='UTF-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <title>Bidding Page</title>
        <link rel='stylesheet' href='../stylings/Bidding.css' />
        <!-- Boostrap CSS -->
        <link
          href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM'
          crossorigin='anonymous'
        />
        <script
          defer
          src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'
          integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz'
          crossorigin='anonymous'
        ></script>
        <script
          src='https://kit.fontawesome.com/fae056ab45.js'
          crossorigin='anonymous'
        ></script>
        <!--Font Links-->
        <link rel='preconnect' href='https://fonts.googleapis.com' />
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
        <link
          href='https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap'
          rel='stylesheet'
        />
        <link rel='preconnect' href='https://fonts.googleapis.com' />
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
        <link
          href='https://fonts.googleapis.com/css2?family=Merriweather&display=swap'
          rel='stylesheet'
        />
        <!--Font Links-->
      </head>
      <body>
        <!--Navigation Bar-->
        <?php
          include('../pages/navigation.php');
        ?>
        <!--Navigation Bar-->
        <main class='container-fluid vh-100'>
          <div class='row row-cols-1 row-cols-lg-2 vh-100 main-row'>
            <div class='col'>
              <?php
                include('../pages/biddingTemplate.php');
              ?>
            </div>
            <div class='col cta-col bg-success-subtle'>
              <p class='title text-center'>Bids</p>
              <div class='row bids-row bg-success-subtle'>
                <div class='bids-table mt-2'>
                  <table class='table table-striped'>
                    <thead>
                      <tr>
                        <th scope='col'></th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Bid Amount</th>
                        <th scope='col'>Date</th>
                      </tr>
                    </thead>
                    <tbody id='tbody'>
                      <!--
                      <tr>
                        <td class='text-center'>
                          <img
                            src='/assets/Teddy.jpg'
                            alt='
                            class='rounded-circle'
                            id='table-img'
                          />
                        </td>
                        <td>Teddy Pascual</td>
                        <td>420</td>
                        <td>2023-1-2</td>
                      </tr>
                      -->
                    </tbody>
                  </table>
                </div>
              </div>
              <?php
                include('bidCta.php');
              ?>
            </div>
          </div>
          <script src='../biddings.js'></script>
        </main>
      </body>
    </html>
    <?php
      include('updateLatest.php');
    ?>
    ";
      fwrite($myFile, $content);
      fclose($myFile);


      $sql = "INSERT INTO auctions (auction_id, owner, crop_type, base_price, volume, img_location, auc_location) VALUES ('$rand', '$owner', '$crop_type', '$base_price', '$volume', '$fileDestination', ' $auctionDestination')";
      mysqli_query($conn, $sql);
      $sqlCreate = "CREATE TABLE `agri1`.`$rand` (`bidder_id` INT NOT NULL , `bidder_name` VARCHAR(50) NOT NULL, `bid_price` INT NOT NULL , `bid_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, UNIQUE(`bidder_id`)) ENGINE = InnoDB;";
      mysqli_query($conn, $sqlCreate);
    
      mysqli_close($conn);
    }
    
  }
?>