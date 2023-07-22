<?php
              include("../database.php");
              $fileName = $_SERVER['PHP_SELF'];
              $goods = explode("/", $fileName);
              $better = $goods[3];
              $actualFileName = explode(".", $better);
              $this_auction_id = intval($actualFileName[0]);
              $sqlAuc = "SELECT * FROM auctions WHERE auction_id=$this_auction_id;";
              $resultAuc = mysqli_query($conn, $sqlAuc);
              if(mysqli_num_rows($resultAuc) > 0) {
                while($row = mysqli_fetch_assoc($resultAuc)) {
                  $auction_id = $row['auction_id'];
                  $owner = $row['owner'];
                  $img_location = $row['img_location'];
                  $base_price = $row['base_price'];
                  $latest_price = $row['latest_price'];
                  $date_created = $row['date_created'];
                  $volume = $row['volume'];
                  echo "
                  <div
                  class='row image-row d-flex justify-content-center align-items-center'
                  >
                  <img src='".$img_location."' alt=' class=' id='bid-image' />
                  </div>
                  <div class='row information-row'>
                  <p class='md-title'>Bidding creation date :".$date_created."</p>
                  <p class='desc'>Auction Id: ".$auction_id."</p>
                  <p class='desc'>Farmer: <span class='fw-bold'>".$owner."</span></p>
                  <p class='desc'>Volume: ".$volume."</p>
                  <p class='desc'>Base Price: <span id='bp'>".$base_price."</span></p>
                  <p class='desc'>
                    Latest Bid Price:
                    <span class='text-success fw-bold' id='lbp'>".$latest_price."</span>
                  </p>
                  </div>";

                }
              }

?>