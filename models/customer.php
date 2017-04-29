<?php
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);

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
    private $customer_id;

    //returns the value of a called property, assuming it exists.
    public function __get($property){
      if(property_exists($this, $property)){
        return $this->$property;
      }
    }

    public function __construct($arr){
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
    }

    private function all_params(){
      $params = array(
        "FirstName" => $this->first_name,
        "LastName" => $this->last_name,
        "Address" => $this->address,
        "City" => $this->city,
        "State" => $this->state,
        "Zip" => $this->zip,
        "Email" => $this->email,
        "Gender" => $this->gender,
        "Phone" => $this->phone
      );
      return $params;
    }

    public function create(){
      include("$root/final/infrastructure/data_objects/customer_do.php");
      $do = new Customer_DO();
      $r = $do->create($this);
      return $r;
    }

    public function edit(){
      include("$root/final/infrastructure/data_objects/customer_do.php");
      $do = new Customer_DO();
      $r = $do->update($this->id, $this->all_params());
      return $r;
    }

  }

 ?>
