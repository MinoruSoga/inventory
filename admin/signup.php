<?php
  include 'Config.php';
  include '../User.php';
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
  <title>signup</title>
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
      <h5 class="card-header text-center bg-secondary text-white">Sign up</h5>
      <div class="card-body">
        <div>
          <h5 class="card-title">Username</h5>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="mt-3">
          <h5 class="card-title">Email</h5>
          <input type="text" class="form-control" name="email">
        </div>
        <div class="mt-3">
          <h5 class="card-title">Password</h5>
          <input type="text" class="form-control" name="pass">
        </div>
        <div class="mt-3">
          <h5 class="card-title">First Name</h5>
          <input type="text" class="form-control" name="firstname">
        </div>
        <div class="mt-3">
          <h5 class="card-title">Last Name</h5>
          <input type="text" class="form-control" name="lastname">
        </div>
      </div>
      <div class="card-footer bg-white">
        <button type="submit" name="login" class="btn btn-secondary form-control">Sign up</button>
      </div>
    </form>
  </div>
</body>
</html>

<?php
        if(isset($_POST['submit'])){
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        

        $user = new User;

        $user->sighup($username, $email, $password, $firstname, $lastname);
        }
      ?>