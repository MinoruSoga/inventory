<?php
require_once 'header.php';
require_once '../class/User.php';
?>
<!doctype html>
<html lang="en">

<head>
  <title>adduser</title>
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
      <h5 class="card-header text-center bg-secondary text-white">Add User</h5>
      <div class="card-body">
        <div class="mb-3">
          <label class="">User Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
          <label class="">First Name</label>
          <input type="text" class="form-control" name="price">
        </div>
        <div class="mb-3">
          <label class="">Last Name</label>
          <input type="text" class="form-control" name="quan">
        </div>
        <div class="mb-3">
          <label class="">Email Address</label>
          <input type="text" class="form-control" name="quan">
        </div>
      </div>
      <div class="card-footer bg-white">
        <button type="submit" name="submit" class="btn btn-outline-secondary form-control">Add User</button>
      </div>
    </div>
  </form>
  <?php

        if(isset($_POST['submit'])){
       
        $cate = $_POST['category'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quan = $_POST['quan'];

        $item = new Item;
        $item->insert($cate, $name, $price, $quan);

        }

      ?>
</body>

</html>