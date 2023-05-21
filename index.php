<?php
session_start();
/*
session_start();

   print_r($_SESSION["user_id"]);*/
if (!isset($_SESSION["user_id"])) {
   header("Location: login.php");

}else{
    
   
    require_once "database.php";
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
              $result = mysqli_query($conn, $sql);
              $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    
    
    
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Maintenance Service</title>
</head>
<body class="bg-dark p">
    <div class="container bg-secondary p-3">
        <h1>Maintenance Service</h1>
        <br>
        <img src="Maintenance Service.jpg"  height="250" width="500" alt="Maintenance Service">
        <br>
        <br>
        <?php
        if (isset($_POST["submit"])) {
            
           $device = $_POST["device"];
           $Problem = $_POST["Problem"];
           $details = $_POST["details"];
           $phone = $_POST["phone"];
           
        

           $errors = array();

           if (empty($device) OR empty($Problem) OR empty($details) OR empty($phone)) {
            array_push($errors,"All fields are required" );
           }
           
           require_once "database.php";
           $sql = "SELECT * FROM maintenance_request WHERE phone = '$phone'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"you  already have a Maintenance REQUEST!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO maintenance_request (name, email,device,Problem,details,phone) VALUES ( ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ssssss",$user["full_name"], $user["email"], $device, $Problem, $details, $phone);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Your Maintenance REQUEST successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <?php if(isset($user)) ?>
        <h1>hello <?= htmlspecialchars($user["full_name"]) ?> 
        <br> Enter maintenance information </h1>
        
        <form action="" method="post">
        <div class="form-group">
        <h3>Enter your device name</h3>
                <input type="text" class="form-control" name="device" placeholder="Device name:">
            </div>
            
              <h3>What is the Problem</h3>
              <div class="form-group">
                <input type="text" class="form-control" name="Problem" list="browsers" placeholder="Explan:">
                <datalist id="browsers">
                <option value="monitor is not working">
                <option value="cpu is not working ">
                <option value="gpu is not working">
                <option value="Heat problem">
                <option value="hard disk is not working">
            </datalist> 
            </div>
            <div>
                <h3>More details:</h3>
               
                <textarea class="form-control" name="details" rows="4" placeholder="Details:"></textarea>

            </div>
            <br> 
            <div>
                <h3>Enter a phone number:</h3>
                <input type="text" class="form-control" name="phone" placeholder="Phone:">
            </div>
            <br>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="submit" name="submit">
            </div>
        </form>
<br>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>
