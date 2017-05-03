<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("$root/final/infrastructure/data_objects/customer_do.php");

  class Customer
  {
    private $id;
    private $first_name;
    private $last_name;
    private $address;
    private $city;
    private $state;
    private $zip;
    private $email;
    private $gender;
    private $phone;
    private $do;

    //returns the value of a called property, assuming it exists.
    public function __get($property){
      if(property_exists($this, $property)){
        return $this->$property;
      }
    }

    public function __construct($arr){
      $root = realpath($_SERVER["DOCUMENT_ROOT"]);
      if(isset($arr["id"])){
        $this->id = $arr["id"];
      }
      $this->first_name = $arr['first_name'];
      $this->last_name = $arr['last_name'];
      $this->address= $arr['address'];
      $this->city = $arr['city'];
      $this->state = $arr['state'];
      $this->zip = $arr['zip'];
      $this->email = $arr['email'];
      $this->gender = $arr['gender'];
      $this->phone = $arr['phone'];
      $this->do = new Customer_DO();
    }

    private function all_params(){
      $params = array(
        "id" => $this->id,
        "first_name" => $this->first_name,
        "last_name" => $this->last_name,
        "address" => $this->address,
        "city" => $this->city,
        "state" => $this->state,
        "zip" => $this->zip,
        "email" => $this->email,
        "gender" => $this->gender,
        "phone" => $this->phone
      );
      return $params;
    }

    public function create(){
      return $this->do->create($this->all_params());
    }

    public function edit(){
      $r = $this->do->update($this->id, $this->all_params());
      return $r;
    }

  }

 ?>
