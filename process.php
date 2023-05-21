<?php
session_start();
/*
session_start();

   print_r($_SESSION["user_id"]);*/
if (!isset($_SESSION["user_id"])) {
  

}else{
    
   
    require_once "database.php";
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
              $result = mysqli_query($conn, $sql);
              $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    
    
    
}


require_once "database.php";
if (isset($_POST["edit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["device"]);
    $type = mysqli_real_escape_string($conn, $_POST["Problem"]);
    $author = mysqli_real_escape_string($conn, $_POST["details"]);
    $description = mysqli_real_escape_string($conn, $_POST["phone"]);
    $id = mysqli_real_escape_string($conn, $_POST["Maintenance_id"]);
    $state = mysqli_real_escape_string($conn, $_POST["state"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $sqlUpdate = "UPDATE maintenance_request SET name = '$name', email = '$email',device = '$title', Problem = '$type', details = '$author', phone = '$description', state = '$state'WHERE Maintenance_id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "request Updated Successfully!";
        header("Location:adminpage.php");
    }else{
        die("Something went wrong");
    }
}
?>