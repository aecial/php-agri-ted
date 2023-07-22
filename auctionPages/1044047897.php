<?php
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
                include("../pages/biddingTemplate.php");
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
              <div class='row cta-row d-flex flex-column align-items-center mt-5'>
                <form action='<?php $_SERVER["PHP_SELF"] ?>' method='post'>
                <div class='input-group w-50 mb-2'>
                
                  <span id='peso-sign' class='input-group-text'>₱</span>
                    <input type="number" name="bidPrice" id="bidPrice" />
                  </div>
                  <button type="submit" name="submit" class='btn btn-success w-25' onclick='lezgo()'
                    id='bid-cta'
                    >Submit</button>
                </form>
              </div>
            </div>
          </div>
          <script src='../biddings.js'></script>
        </main>
      </body>
    </html>
    <?php
      if(isset($_POST['submit'])) {
        $bid = intval($_POST['bidPrice']);
        echo "<h1>$bid</h1>";
        if(empty($_POST['bidPrice'])) {
          echo "WTF";
        }
        else {
          $bid = intval($_POST['bidPrice']);
          echo "This is my $bid";
          include("../database.php");
          $fileName = $_SERVER['PHP_SELF'];
          $goods = explode("/", $fileName);
          $better = $goods[3];
          $actualFileName = explode(".", $better);
          $this_auction_id = intval($actualFileName[0]);
          $sql = "UPDATE auctions SET latest_price='{$bid}' WHERE auction_id='{$this_auction_id}';";
          $result = mysqli_query($conn, $sql);
          echo "<h1>Lezgo</h1>";
        }
       
      }
      else {
        echo "<h1>Ror</h1>";
      }
  
?>