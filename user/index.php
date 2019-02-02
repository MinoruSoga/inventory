<?php
session_start();
$user_id = $_SESSION['user_id'];

require_once 'header.php';
require_once '../class/User.php';
require_once '../class/Item.php';
require_once '../class/Purchase.php';
// $user = new User;
// $user->login_requires();

?>
<!doctype html>
<html lang="en">

<head>
  <title>Item</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
</head>


<body class="san">

  <h1 class="ml-5">All Items</h1>

  <div class="row mx-5">
    <?php
  $items = new Item;
  $result = $items->get_items();
  // var_dump($result);
  // print_r($result);
  if($result){
  foreach($result as $row){
  $item_id = $row['item_id'];
  $item_quantity = $row['item_quantity'];
  $item_status = $row['item_status'];

  echo "<div class='col-sm-4 mt-5'>";
    echo "<div class='card'>";
      echo "<div class='card-body'>";
        echo "<h3 class='card-title'>" .$row['item_name']. "</h3>";
        echo "<p>Price:" .$row['item_price'] ."</p>";

        if($item_status == 'available'){
          echo "<form method='post'>";
          echo "<div class='form-grop'>";
          echo "<input type='hidden' name='item_id' value='$item_id'>";
          echo "<input type='number' class='form-control w-25 my-3' name='quantity' max='$item_quantity' min='1'>";
          echo "</div>";
          echo "<button type='submit' name='buy' class='btn btn-primary text-white btn-block w-50'>Buy</button>";
          echo "</form>";
        }else{
          echo "<div class='form-group'>";
          echo "<input type='number' class='form-control w-25 readonly' max='$item_quantity' min='1' readonly>";
          echo "</div>";
          echo "<a class='btn btn-pramary disabled text-white btn-block w-50'>Sold Out</a>";
        }
        echo "</div>";
      echo "</div>";
    echo "</div>";

  }
  }
?>
  </div>
  <?php



if(isset($_POST['buy'])){
  $item_id=$_POST['item_id'];
  $purchase_quantity=$_POST['quantity'];
  $purchase=new Purchase;
  $purchase->buy($item_id, $purchase_quantity, $user_id);
} 

?>
</body>

</html>