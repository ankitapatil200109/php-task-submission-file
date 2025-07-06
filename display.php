<?php
include 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-3">User Details</h1>
    <button class="btn btn-primary my-5"><a href="user.php" class="text-white text-decoration-none" >Add User</a></button>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operation</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php

  $sql="select * from `student_record`";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $password=$row['password'];

        echo '
        <tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$mobile.'</td>
      <td>'.$password.'</td>
      <td><button class="btn btn-info "><a href="update.php? update_id='.$id.'" class="text-decoration-none text-white">Update  </a></button>
    <td><button class="btn btn-danger"><a href="delete.php? delete_id='.$id.'" class="text-decoration-none text-white">Delete  </a></button>
    </tr>';
        

    }
    
    
  }

  ?>
    
  </tbody>
</table>



</div>

    
</body>
</html>