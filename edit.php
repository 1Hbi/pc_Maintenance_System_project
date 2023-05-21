<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit request</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Edit request</h1>
            <div>
            <a href="adminpage.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <?php 
            
            if (isset($_GET['Maintenance_id'])) {
                include("database.php");
                $id = $_GET['Maintenance_id'];
                $sql = "SELECT * FROM maintenance_request WHERE Maintenance_id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="state" placeholder="state:" value="<?php echo $row["state"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="Maintenance_id" placeholder="Maintenance_id:" value="<?php echo $row["Maintenance_id"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="name" placeholder="name:" value="<?php echo $row["name"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="email" placeholder="email:" value="<?php echo $row["email"]; ?>">
            </div>
                     <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="device" placeholder=" device:" value="<?php echo $row["device"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="Problem" placeholder=" Problem:" value="<?php echo $row["Problem"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="phone" placeholder=" phone:" value="<?php echo $row["phone"]; ?>">
            </div>
            <div class="form-element my-4">
                <textarea name="details" id="" class="form-control" placeholder="details:"><?php echo $row["details"]; ?></textarea>
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit"  value="Edit request" class="btn btn-primary">
            </div>
                <?php
            }else{
                echo "<h3>request Does Not Exist</h3>";
            }
            ?>
           
        </form>
        
        
    </div>
</body>
</html>