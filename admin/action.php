<?php
include "../db/db.php";
include "session.php";
// category add
if (isset($_POST['category_submit'])){
    $name=$_POST['category_name'];
    $sql="insert into category(name) VALUES('".$name."')";
    $query=mysqli_query($con,$sql);
    if($query){
        header("location:category.php");
    }
}
// product add
if(isset($_POST['create_product'])){
    $name=$_POST['product_name'];
    $price=$_POST['product_price'];
    $description=$_POST['product_description'];
    $status=$_POST['product_status'];
    $action=$_POST['product_action'];
    $category=$_POST['product_category'];
    if(isset($_FILES['product_image'])){
        $file_name = $_FILES['product_image']['name'];
        $file_tmp =$_FILES['product_image']['tmp_name'];
        $file_ext=strtolower(end(explode('.',$_FILES['product_image']['name'])));
        $name=$_POST['product_name'];
        $image_name=$name.date("Y-m-d").'.'.$file_ext;
        $upload=move_uploaded_file($file_tmp,"../image/product/".$image_name);
    }
    if ($upload){
        $sql="INSERT INTO product (name, price, image,description,status,action,category_id) VALUES ('".$name."', '".$price."', '".$image_name."', '".$description."', ".$status.",".$action.", ".$category.");";
        $query=mysqli_query($con,$sql);
        if($query){
            header("location:product.php");
        }
    }
}
// add admin
if(isset($_POST['create_admin'])){
    $name=$_POST['name'];
    $login=$_POST['login'];
    $password=$_POST['password'];
    $password_hash=sha1($password);
    $sql="insert into admin(name,login,password) values('".$name."','".$login."','".$password_hash."')";
    $query=mysqli_query($con,$sql);
    if($query){
        header("location:admin.php");
    }
}

// create featured product
if(isset($_POST['create_featured_product'])){
    $name=$_POST['product_name'];
    $price=$_POST['product_price'];
    $description=$_POST['product_description'];
    $status=$_POST['product_status'];
    $action=$_POST['product_action'];
    $category=$_POST['product_category'];
    if(isset($_FILES['product_image'])){
        $file_name = $_FILES['product_image']['name'];
        $file_tmp =$_FILES['product_image']['tmp_name'];
        $file_ext=strtolower(end(explode('.',$_FILES['product_image']['name'])));
        $name=$_POST['product_name'];
        $image_name=$name.'.'.$file_ext;
        $upload=move_uploaded_file($file_tmp,"../image/featured_product/".$image_name);
    }
    if ($upload){
        $sql="INSERT INTO featur_product (name, price, image,description,status,action,category_id) VALUES ('".$name."', '".$price."', '".$image_name."', '".$description."', ".$status.",".$action.", ".$category.");";
        $query=mysqli_query($con,$sql);
        if($query){
            header("location:featured_product.php");
        }
    }
}
// add about us
if(isset($_POST['create_about'])){
    $about=$_POST['about'];
    $sql="insert into about(about) values('".$about."')";
    $query=mysqli_query($con,$sql);
    if($query){
        header("location:about.php");
    }
}
// add delivery
if(isset($_POST['create_delivery'])){
    $delivery=$_POST['delivery'];
    $sql="insert into delivery(delivery) values('".$delivery."')";
    $query=mysqli_query($con,$sql);
    if($query){
        header("location:delivery.php");
    }
}
// add security
if(isset($_POST['create_security'])){
    $security=$_POST['security'];
    $sql="insert into security(security) values('".$security."')";
    $query=mysqli_query($con,$sql);
    if($query){
        header("location:security.php");
    }
}
// add eco
if(isset($_POST['create_eco'])){
    $eco=$_POST['eco'];
    $sql="insert into eco(eco) values('".$eco."')";
    $query=mysqli_query($con,$sql);
    if($query){
        header("location:eco.php");
    }
}