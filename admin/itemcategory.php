
<?php
require_once 'header.php';
// require_once 'class/Item.php';
// require_once 'class/Category.php';
require_once '../class/Item.php';

// $categories = new Category;
// $result = $categories->get_categories_id($id);
// $category_id = $row['category_id'];
?>
<!doctype html>
<html lang="en">
  <head>
    <title>itemCategory</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <table class="table">
  <thead class="thead-gray bg-secondary text-white">
    <tr>
      <th scope="col">Item ID</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Price</th>
      <th scope="col">Item Quantity</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
          $category_id = $_GET['id'];
          $items = new Item;
          $result = $items->get_itemcate($category_id);
          // var_dump($result);
          // print_r($result);
          if($result){
            foreach($result as $row){
              $item_id = $row['item_id'];
              echo "<tr>";
              echo "<td>" .$row['item_id']. "</td>";
              echo "<td>" .$row['item_name']. "</td>";
              echo "<td>" .$row['item_price']. "</td>";
              echo "<td>" .$row['item_quantity']. "</td>";
              echo "<td>";
              echo "<a href='edititem.php?id=$item_id' class='btn btn-sm btn-info text-white'>Edit</a>";
              echo " <a href='deleteitem.php?id=$item_id' class='btn btn-sm btn-danger text-white'>Delete</a>";
              echo "</td>";
              echo "</tr>";

            }
          }
        ?>
   
  </tbody>
</table>
<a href="additem.php">
<button type="submit" name='submit' class="btn btn-primary mb-2">Add Item</button>
</a>
    </div>
      
      </body>
</html>