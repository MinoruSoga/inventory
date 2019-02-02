<?php
session_start();
$user_id = $_SESSION['user_id'];

require_once 'header.php';
require_once '../class/User.php';
require_once '../class/Item.php';
require_once '../class/Purchase.php';

$category_id = $_GET['id'];
$item = new Item;
$row = $item->get_item_from_cateid($category_id);
$item_name = $row['item_name'];
$item_price = $row['item_price'];
$item_id = $row['item_id'];
// $user = new User;
// $user->login_requires();

?>
<!doctype html>
<html lang="en">

<head>
  <title>Purchase History</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <style>
    .status {
      color: white;
    }
  </style>
</head>

<body class="san">
  <div class="card mx-5 mt-5">
    <div class="card-header">
      <h2>Purchase History</h2>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Purchase ID</th>
            <th scope="col">Item Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $purchase = new Purchase;
          $result = $purchase->get_purchase($item_id, $user_id);
          // var_dump($result);
          // print_r($result);
          if($result){
            foreach($result as $row){
              echo "<tr>";
              echo "<td>" .$row['purchase_id']. "</td>";
              echo "<td>" .$item_name. "</td>";
              echo "<td>" .$row['quantity']. "</td>";
              echo "<td>" .$row['subtotal']. "</td>";
              echo "<td>" .$item_price. "</td>";
              // echo "<td>" .$row['purchase_status']. "</td>";
              if($row['purchase_status'] == 'pending'){
                echo "<td><span class='badge badge-success status'>" . $row['purchase_status'] . "</span></td>";
              }
              else{
                echo "<td><span class='badge badge-warning status'>" . $row['purchase_status'] . "</span></td>";
              }
              echo "<td>";
              
              // echo "<form action='' method='post'>";
              // echo " <button type='delete'name='delete' class='btn btn-sm btn-danger text-white'>Delete</bitton>";
              // echo "</form>";
              // if(isset($_POST['delete'])){
                // $category = new Category;
                // $category->delete($category_id);
              // }

              echo "</td>";
              echo "</tr>";

            }
          }
        ?>

        </tbody>
      </table>
    </div>
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