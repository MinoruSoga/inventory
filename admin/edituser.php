<?php
require_once 'header.php';
require_once '../class/User.php';
$id = $_GET['id'];
$user = new User;
$row = $user->get_user($id);
?>
<!doctype html>
<html lang="en">

<head>
  <title>edituser</title>
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
      <h5 class="card-header text-center bg-secondary text-white">Edit User</h5>
      <div class="card-body">
        <div class="mb-3">
          <label class="card-title">Username</label>
          <input type="text" name="name" class="form-control" value="<?php echo $row['username'] ?>">
        </div>
        <div class="mb-3">
          <label class="card-title">Email</label>
          <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>">
        </div>

        <div class="form-row">
          <div class="mb-3 col">
            <label class="card-title">Firstname</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $row['firstname'] ?>">
          </div>
          <div class="mb-3 col">
            <label class="card-title">Lastname</label>
            <input type="text" name="lname" class="form-control" value="<?php echo $row['lastname'] ?>">
          </div>
        </div>

        <!-- <div class="mb-3">
          <label class="card-title">Birthday</label>
          <input type="text" class="form-control">

        </div> -->

      </div class="mb-3">
      <div class="card-footer bg-white">
        <button type="submit" name="submit" class="btn btn-outline-secondary form-control">Resister</button>
      </div>
    </div>
  </form>
  <?php
    $id = $_GET['id'];
      if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];

      $user->update($name, $email, $fname, $lname, $id);

      }
  ?>


</body>

</html>