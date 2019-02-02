<?php
require_once "Config.php";

class Purchase extends Config{

  public function buy($item_id, $purchase_quantity, $user_id, $category_id){
    $sql = "SELECT * FROM items WHERE item_id=$item_id";
    $result = $this->conn->query($sql);
    $row = $result->fetch_assoc();
    $quantity = $row['item_quantity'];
    $price = $row['item_price'];
    $new_q = $quantity - $purchase_quantity;
    $total = $price * $purchase_quantity;

    if($new_q <= 0){
      $sql = "UPDATE items SET item_quantity='$new_q', item_status='soldout' WHERE item_id=$item_id";

    }
    else{
      $sql = "UPDATE items SET item_quantity='$new_q' WHERE item_id=$item_id";
    }
    

    $result = $this->conn->query($sql);
    if($result){
      $sql = "INSERT INTO purchase(item_id, user_id, quantity, subtotal, purchase_status) VALUES($item_id, $user_id, $purchase_quantity, '$total', 'pedding')";
      $result = $this->conn->query($sql);
      if($result){
        $this->redirect_js("purchasehistory.php?id=$category_id");
      }
      else{
        echo $this->conn->error;
      }
    }
    else{
      echo $this->conn->error;
    }
  }
  public function get_purchase($item_id, $user_id){
    $sql = "SELECT * FROM purchase WHERE item_id=$item_id AND user_id=$user_id";
    $result = $this->conn->query($sql);

    $rows = array();
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $rows[] = $row;
        }
        return $rows;
      }
      else{
        return $this->conn->error;
      }
    }



}

?>