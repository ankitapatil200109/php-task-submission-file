<?php

include 'connect.php';
if(isset($_GET['delete_id']))
{
    $id=$_GET['delete_id'];
    $sql="delete from `student_record` where id=$id ";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        // echo "deleted successfully";
        header('location:display.php');
        
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }
}