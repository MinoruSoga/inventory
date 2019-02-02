<?php
require_once 'header.php';
require_once '../class/User.php';

?>
<!doctype html>
<html lang="en">

  <head>
    <title>HP</title>
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
      <th scope="col">User ID</th>
      <th scope="col">Username</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email Address</th>
      <!-- <th scope="col">Birthday</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
          $users = new User;
          $result = $users->get_users();
          // var_dump($result);
          // print_r($result);
          if($result){
            foreach($result as $row){
              $user_id = $row['user_id'];
              echo "<tr>";
              echo "<td>" .$row['user_id']. "</td>";
              echo "<td>" .$row['username']. "</td>";
              echo "<td>" .$row['firstname']. "</td>";
              echo "<td>" .$row['lastname']. "</td>";
              echo "<td>" .$row['email']. "</td>";
              echo "<td>";
              echo "<a href='edituser.php?id=$user_id' class='btn btn-sm btn-info text-white mr-3'>Edit</a>";
              echo "<a href='deleteuser.php?id=$user_id' class='btn btn-sm btn-danger text-white'>Delete</a>";
              echo "</td>";
              echo "</tr>";
            }
          }
        ?>
  </tbody>
</table>
<a href="adduser.php" class="btn btn-primary mb-2">Add User</a>
    </div>
      
      </body>
</html>