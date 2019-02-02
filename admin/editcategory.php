<?php
require_once 'header.php';
require_once '../class/Category.php';

$id = $_GET['id'];
$category = new Category;
$row = $category->get_category($id);
?>
<!doctype html>
<html lang="en">

<head>
  <title>editcategory</title>
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
    <h5 class="card-header text-center bg-secondary text-white">Edit Category</h5>
    <div class="card-body">
      <label class="card-title">Category Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $row['category_name'] ?>">
    </div>
    <div class="card-footer bg-white">
      <button class="btn btn-outline-secondary form-control" type="submit" name="submit">Edit Category</button>
    </div>
  </div>
  </form>

  <?php
      $id = $_GET['id'];
        if(isset($_POST['submit'])){
        $name = $_POST['name'];

        $category->update($name, $id);

        }
      ?>
</body>

</html>