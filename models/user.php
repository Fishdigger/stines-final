<?php

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
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      include("$root/final/infrastructure/data_objects/user_do.php");
      $do = new User_DO();
      return $do->create($this->toArray());
    }

    public function getID(){
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      $do = new User_DO();
      $this->id = $do->getIDByUsername($this->username);
      return $this->id;
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
