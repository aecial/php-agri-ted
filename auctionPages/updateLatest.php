<?php
  if(isset($_POST['submitLatest'])) {
    $bid = intval($_POST['bidPrice']);
    include("../database.php");
    $fileName = $_SERVER['PHP_SELF'];
    $goods = explode("/", $fileName);
    $better = $goods[3];
    $actualFileName = explode(".", $better);
    $this_auction_id = intval($actualFileName[0]);
    $sql = "UPDATE auctions SET latest_price=$bid WHERE auction_id=$this_auction_id;";
  }
  
?>