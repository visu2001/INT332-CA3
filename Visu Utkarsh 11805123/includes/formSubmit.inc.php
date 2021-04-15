<?php

require_once 'db.inc.php';
require_once 'functions.inc.php';


$table='booking';
if(isset($_SESSION['username'])){
    $user_bookings=selectAll($table,['userId'=>$_SESSION["useruid"]]);
}
if(isset($_POST['submit'])){

    session_start();
    $name=$_POST['name'];
    $email=$_POST['email'];
    $street=$_POST['street'];
    $city=$_POST['city'];
    $post_code=$_POST['post-code'];
    $country=$_POST['country'];
    $userId=$_POST['userId']= $_SESSION['useruid'];
    
    $query="INSERT INTO `harsh-task`.`booking` (`name`,`email`,`street`,`city`,`post-code`,`country`,`userId`) VALUES ('$name','$email','$street','$city','$post_code','$country','$userId')";
    
    $query_run=mysqli_query($conn,$query);
   
    if($query_run){
        $_SESSION['status']="Response recorded successfully.";
        header('location: ../form.php');
    }else{
        $_SESSION['status']="Response Failed.";
        header('location: ../form.php');
    }
  
}
