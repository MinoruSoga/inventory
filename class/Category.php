<?php
  require_once "Config.php";

  class Category extends Config{

    public function get_categories(){
      //query
      $sql = "SELECT * FROM category";
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
    


    public function get_category($id){
      $sql = "SELECT * FROM category WHERE category_id=$id";
      $result = $this->conn->query($sql);

      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row;
      }else{
        return $this->conn->error;
      }
    }

    public function insert($name){

      $sql = "INSERT INTO category(category_name) VALUES('$name')";
      $result = $this->conn->query($sql);
      
      
  
      if($result){
        // echo "<script>window.locatin.replace('categories.php)</script>";
        // header("Location: categories.php");
        return true;
        
      }else{
        echo "Error in inserting record " .$this->conn->error;
      }
    }




    public function update($name, $id){

      $sql = "SELECT * FROM category WHERE category_name = '$name' AND category_id != $id";
      $result = $this->conn->query($sql);
      if($result->num_rows > 0){
        echo "Username is already taken";
      }
      else{
        $sql = "UPDATE category SET category_name='$name' WHERE category_id=$id";
        
        $result = $this->conn->query($sql);

        if($result){
          // header("Location: categories.php");
          $this->redirect_js('categories.php');
        }
        else{
          echo "Error: ".$this->conn->error;
        }
      }
    }

    public function delete($id){

      $sql = "DELETE FROM category WHERE category_id=$id";

      $result = $this->conn->query($sql);
      if($result){
        $this->redirect_js('categories.php');
      }
      else{
          echo "Error: ".$this->conn->error;
      }

    }
    public function get_categories_id($id){
      // $sql = "SELECT items.item_id, items.item_name, items.item_price, items.item_quantity FROM items INNER JOIN category ON items.category_id = category.category_id";
      $sql = "SELECT category_id FROM category WHERE category_id = $id";

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