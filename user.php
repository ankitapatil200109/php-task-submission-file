<?php

include 'connect.php';
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql="insert into `student_record`(name,email,mobile,password)
    values('$name','$email','$mobile','$password')";

    $result=mysqli_query($conn,$sql);
    if($result)
    {
        //echo "inserted successfully";
        header('location:display.php');
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }
}
?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>crud operation</title>
  </head>
  <body>
    <h1 class="text-center mt-5 mb-3">User Form</h1>
   <div class="container my-5">
   <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Your name</label>
    <input type="text" class="form-control" name="name" >
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Your Email</label>
    <input type="email" class="form-control" name="email">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Your Mobile Number</label>
    <input type="number" class="form-control" name="mobile">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
</form>
</div>

   
  </body>
</html>