<?php

  class User{
    private $id;
    private $username;
    private $password;
    private $do;


    public function getUsername(){
      return $this->username;
    }

    public function __construct($arr){
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      include("$root/final/infrastructure/data_objects/user_do.php");
      if(isset($arr['id'])){
        $this->id = $arr['id'];
      }
      $this->username = $arr['username'];
      $this->password = $arr['password'];
      $this->do = new User_DO();
    }

    public function create(){
      return $this->do->create($this->toArray());
    }

    public function getID(){
      $this->id = $this->do->getIDByUsername($this->username);
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
