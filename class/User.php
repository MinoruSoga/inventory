<?php
  require_once "Config.php";

  class User extends Config{

//all pages except login.php
  public function login_requires(){
    session_start();
    if($_SESSION['user_id'] == FALSE){
      $this->redirect_js('../login.php');
    }
  }
  //login.php
  public function logged_in(){
    session_start();
    if(isset($_SESSION{'user_id'})){
      //$SERVER['HTTP_REFERER] - previous page
      // echo "<script>window.location.replace('".$_SERVER['HTTP_REFERER']."')</script>";
      $this->redirect_js('javascript://history.go(-1)');
      exit;
    }
  }

  public function login($username, $password){
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result=$this->conn->query($sql);

    if($result->num_rows > 0){
      session_start();
      $row=$result->fetch_assoc();
      $_SESSION['user_id'] = $row['user_id'];
      if($row['permission'] == 'admin'){
        $this->redirect_js("admin/index.php");
        // echo $_SESSION['user_id'];
      }
      elseif($row['permission'] == 'user'){
        $this->redirect_js('user/index.php');
        // echo $_SESSION['user_id'];
      }
    }
    else{
      echo "Invalid Username or Password";
    }
  }

  public function logout(){
    session_start();
    session_destroy();
    $this->redirect_js('../login.php');
  }


  public function get_users(){
    //query
    $sql = "SELECT * FROM users";
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
  public function get_user($id){
    $sql = "SELECT * FROM users WHERE user_id=$id";
    $result = $this->conn->query($sql);

    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      return $row;
    }else{
      return $this->conn->error;
    }
  }

  public function update($name, $email, $fname, $lname, $id){

    // $sql = "SELECT * FROM users WHERE item_name = '$name' AND item_id != $id";
    // $result = $this->conn->query($sql);
    // if($result->num_rows > 0){
      // echo "Username is already taken";
    // }
    // else{
      $sql = "UPDATE items SET username='$name', email='$email', firstname='$fname', lastname='$lname' WHERE user_id=$id";
      
      $result = $this->conn->query($sql);

      if($result){
        $this->redirect_js('index.php');
      }
      else{
        echo "Error: ".$this->conn->error;
      }
    // }
  }

  public function delete($id){

    $sql = "DELETE FROM users WHERE user_id=$id";

    $result = $this->conn->query($sql);
    if($result){
      $this->redirect_js('index.php');
    }
    else{
        echo "Error: ".$this->conn->error;
    }
  }





  }



  
    
?>
