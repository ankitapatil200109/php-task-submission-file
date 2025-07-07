<?php
include 'connect.php';

$id = $_GET['update_id'];


//fetching existing record from table
$sql = "SELECT * FROM `student_record` WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "UPDATE `student_record` SET name='$name', mobile='$mobile', email='$email', password='$password' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        
         header('location:display.php');  
    } else {
        die("Update failed: " . mysqli_error($conn));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Operation - Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <h1 class="text-center mt-5 mb-3">Update User Details</h1>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Enter Your Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Your Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Your Mobile Number</label>
                <input type="number" class="form-control" name="mobile" value="<?php echo $mobile; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
  </body>
</html>
