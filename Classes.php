<?php
include_once "iOperations.php";
include_once "functions.php";
class User{
    public $Userid;
    public $name;
    public $email;
    public $sex;
    private $password;
    public $DonationType;
    public $DonationTypeId;

public function getPassword()
    {
        return $this->password;
    }
public function login($Userid, $password){
    $this->Userid = $Userid;
    $this->password = $password;
}
public function logout(){
    session_start();
    session_unset();
    session_destroy();
    
    header("Location: login.html");
    exit();
    
}
public function register($name,$email,$password){
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
}
public function updateAccount($Userid, $name, $email, $password){
    $this->Userid = $Userid;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
}
}


