<?php
require_once 'header.php';
require_once '../class/Category.php';
?>
<!doctype html>
<html lang="en">

<head>
  <title>category</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <table class="table">
      <thead class="thead-gray bg-secondary text-white">
        <tr>
          <th scope="col">Category ID</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $categories = new Category;
          $result = $categories->get_categories();
          // var_dump($result);
          // print_r($result);
          if($result){
            foreach($result as $row){
              $category_id = $row['category_id'];
              echo "<tr>";
              echo "<td>" .$row['category_id']. "</td>";
              echo "<td>" .$row['category_name']. "</td>";
              echo "<td>";
              echo "<a href='editcategory.php?id=$category_id' class='btn btn-sm btn-info text-white'>Edit</a>";
              echo " <a href='deletecategory.php?id=$category_id' class='btn btn-sm btn-danger text-white'>Delete</a>";
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

        <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>
        <a href='editcategory.php?id=$task_id' class='btn btn-sm btn-info text-white'>Edit</a>
        <a href='change.php?id=$task_id' class='btn btn-sm btn-danger text-white'>Delete</a>
      </td>
    </tr> -->
      </tbody>
    </table>
    <a href="addcategory.php">
      <button type="submit" name='submit' class="btn btn-primary mb-2">Add Category</button>
    </a>
  </div>

</body>

</html>