<?php
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
  class User{
    private $id;
    private $username;
    private $password;

    public function getUsername(){
      return $this->username;
    }

    public function __construct($arr){
      if(isset($arr['id'])){
        $this->id = $arr['id'];
      }
      $this->username = $arr['username'];
      $this->password = $arr['password'];
    }

    public function create(){
      include("$root/final/infrastructure/data_objects/user_do.php");
      $do = new User_DO();
      return $do->create($this->toArray());
    }

    private function toArray(){
      return array(
        'id' => $this->id,
        'username' => $this->username,
        'password' => $this->password
      );
    }
  }
 ?>
