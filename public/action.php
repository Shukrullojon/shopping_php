<?php
include "../db/db.php";

if(isset($_POST['user_create'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $login=$_POST['login'];
    $password=$_POST['password'];
    $password_hash=sha1($password);
    //echo $first_name."  ".$last_name."  ".$email." ".$phone."<br>";
    //echo $address." ".$login."  ".$password;
    $sql="insert into customer(first_name,last_name,email,phone,address,login,password) values('".$first_name."','".$last_name."','".$email."','".$phone."','".$address."','".$login."','".$password_hash."')";
    $query=mysqli_query($con,$sql);
    if($query){
        header("location:user.php");
    }
}