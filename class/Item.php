<?php
  require_once "Config.php";

  class Item extends Config{

    public function get_items(){
      //query
      $sql = "SELECT * FROM items";
      $result = $this->conn->query($sql);

      //initialize an array
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
    


    public function get_item($id){
      $sql = "SELECT * FROM items WHERE item_id=$id";
      $result = $this->conn->query($sql);

      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
      }else{
        return $this->conn->error;
      }
    }

    public function insert($cate, $name, $price, $quan){

      $sql = "INSERT INTO items(category_id, item_name, item_price, item_quantity, item_status) VALUES('$cate', '$name', '$price', '$quan', 'available')";
      $result = $this->conn->query($sql);
      
      if($result){
        // echo "<script>window.locatin.replace('categories.php)</script>";
        // header("Location: categories.php");
        $this->redirect_js('item.php');
        return true;
        
      }else{
        echo "Error in inserting record " .$this->conn->error;
      }
    }




    public function update($name, $price, $quan, $id){

      $sql = "SELECT * FROM items WHERE item_name = '$name' AND item_id != $id";
      $result = $this->conn->query($sql);
      if($result->num_rows > 0){
        echo "Username is already taken";
      }
      else{
        // $sql = "UPDATE items SET item_name = '$name', item_price = '$price', item_quantity = '$quan' WHERE item_id=$id";
        $sql = "UPDATE items SET item_name='$name', item_price='$price', item_quantity='$quan' WHERE item_id=$id";
        
        $result = $this->conn->query($sql);

        if($result){
          $this->redirect_js('item.php');
        }
        else{
          echo "Error: ".$this->conn->error;
        }
      }
    }

    public function delete($id){

      $sql = "DELETE FROM items WHERE item_id=$id";

      $result = $this->conn->query($sql);
      if($result){
        $this->redirect_js('item.php');
      }
      else{
          echo "Error: ".$this->conn->error;
      }
    }


      public function get_itemcate($category_id){
        //query
        $sql = "SELECT * FROM items WHERE category_id=$category_id";
        $result = $this->conn->query($sql);
  
        //initialize an array
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
      public function get_item_from_cateid($category_id){
        $sql = "SELECT * FROM items WHERE category_id=$category_id";
        $result = $this->conn->query($sql);
  
        if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          return $row;
        }else{
          return $this->conn->error;
        }
      }


  }
    
?>