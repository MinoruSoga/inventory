<?php
require_once 'header.php';
require_once '../class/Item.php';

$id = $_GET['id'];
$item = new Item;
$row = $item->get_item($id);

?>
<!doctype html>
<html lang="en">

<head>
  <title>edititem</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
</head>

<body>
  <form action="" method="post">

    <div class="card container px-0 mt-5">
      <h5 class="card-header text-center bg-secondary text-white">Edit Item</h5>
      <div class="card-body">
        <div class="mb-3">
          <label class="">Item Name</label>
          <input type="text" name="name" class="form-control"value="<?php echo $row['item_name'] ?>">
        </div>
        <div class="mb-3">
          <label class="">Item Price</label>
          <input type="text" name="price" class="form-control"value="<?php echo $row['item_price'] ?>">
        </div>
        <div class="mb-3">
          <label class="">Item Quantity</label>
          <input type="text" name="quan" class="form-control"value="<?php echo $row['item_quantity'] ?>">
        </div>
      </div class="mb-3">
      <div class="card-footer bg-white">
        <button type="submit" name="submit" class="btn btn-outline-secondary form-control">Update Item</button>
      </div>
    </div>
  </form>
  <?php
    $id = $_GET['id'];
      if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $price = $_POST['price'];
      $quan = $_POST['quan'];

      $item->update($name, $price, $quan, $id);

      }
  ?>
</body>

</html>