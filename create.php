<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Maintenance_Request</title>
</head>
<body>
    <div class="container my-5">
    <?php
        if (isset($_POST["create"])) {
            $full_name = $_POST["name"];
            $email = $_POST["email"];
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
                mysqli_stmt_bind_param($stmt,"ssssss",$full_name, $email, $device, $Problem, $details, $phone);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Your Maintenance REQUEST successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
    <header class="d-flex justify-content-between my-4">
            <h1>Add New Request</h1>
            <div>
            <a href="adminpage.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        
        <form action="" method="post">
        <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="name" placeholder="name:">
            </div>   
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="email" placeholder="email:">
            </div>   
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="device" placeholder="Device name:">
            </div>   
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
            <div class="form-element my-4">
            <textarea class="form-control" name="details" rows="4" placeholder="Details:"></textarea>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="phone" placeholder="Phone:">
            </div>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Request" class="btn btn-primary">
            </div>
        </form>
        
        
    </div>
</body>
</html>