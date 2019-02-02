<?php

include '../class/Category.php';
$id = $_GET['id'];

$category = new Category;

$category->delete($id);


  ?>