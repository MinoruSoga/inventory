<?php
session_start();
$user_id = $_SESSION['user_id'];
require_once '../class/Category.php';
require_once '../class/User.php';
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <style>
    .san {
      font-family: serif;
      font-size: 20px;
    }
  </style>
</head>

<body class="san">
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Category Select
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php
              $category = new Category;
              $result = $category->get_categories();
              foreach($result as $row){
                $cat_id = $row['category_id'];
                $cat_name = $row['category_name'];
                echo "<a class='dropdown-item' href='categories.php?id=$cat_id'>$cat_name</a>";
                // echo "<option value='$cat_id'>$cat_name</option>";
              }
            ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">items</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="purchasehistory.php">Purchase History</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Purchase History
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php
              // $category = new Category;
              $result = $category->get_categories();
              foreach($result as $row){
                $cat_id = $row['category_id'];
                $cat_name = $row['category_name'];
                echo "<a class='dropdown-item' href='purchasehistory.php?id=$cat_id'>$cat_name</a>";
                // echo "<option value='$cat_id'>$cat_name</option>";
              }
            ?>
          </div>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="">Welcome,
            <?php
              $user = new User;
              $row = $user->get_user($user_id);
              echo $row['username'] 
            ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>