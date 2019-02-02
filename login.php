<?php

  require_once 'class/User.php';
  $user = new User;
  // session_start();
  // session_destroy();
  $user->logged_in();
?>
<!doctype html>
<html lang="en">
<style>
  .card-header{
    height:100px;
    font-size:70px;
    font-family:serif;
  }
</style>

<head>
  <title>login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
</head>

<body class="san">

  <div class="card container px-0 mt-5 w-50">
    <form action="" method="post">
      <h5 class="card-header text-center bg-secondary text-white">Log in</h5>
      <div class="card-body">
        <div>
          <h5 class="card-title">Username</h5>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="mt-3">
          <h5 class="card-title">Password</h5>
          <input type="password" class="form-control" name="password">
        </div>
      </div>
      <div class="card-footer bg-white">
        <button type="submit" name="login" class="btn btn-secondary form-control">Log in</button>
      </div>
    </form>
  </div>
</body>

</html>

<?php
  if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $user->login($username, $password);
  }

?>