<?php

include '../class/Item.php';
$id = $_GET['id'];

$item = new Item;

$item->delete($id);


  ?>