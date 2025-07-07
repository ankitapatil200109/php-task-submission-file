<?php
include 'connect.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $mobile = ($_POST['mobile']);
    $password = ($_POST['password']);

    
    if (empty($name) || strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (!preg_match('/^\d{10}$/', $mobile)) {
        $errors[] = "Mobile number must be 10 digits.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    // === INSERT IF NO ERRORS ===
    if (empty($errors)) {
        $sql = "INSERT INTO `student_record`(name, email, mobile, password)
                VALUES ('$name', '$email', '$mobile', '$password')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location:display.php');
            exit;
        } else {
            $errors[] = "Database Error: " . mysqli_error($conn);
        }
    }
}
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD Operation</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery and jQuery Validate -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

  <style>
    label.error {
      color: red;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

  <h1 class="text-center mt-5 mb-3">User Form</h1>

  <div class="container my-5">


    <?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    <ul>
      <?php foreach ($errors as $error): ?>
        <li><?= htmlspecialchars($error) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

    <form id="userForm" method="post" novalidate>
      <div class="mb-3">
        <label class="form-label">Enter Your Name</label>
        <input type="text" class="form-control" name="name">
      </div>

      <div class="mb-3">
        <label class="form-label">Enter Your Email</label>
        <input type="email" class="form-control" name="email">
      </div>

      <div class="mb-3">
        <label class="form-label">Enter Your Mobile Number</label>
        <input type="text" class="form-control" name="mobile">
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>

  <script>
    $(document).ready(function () {
      $("#userForm").validate({
        rules: {
          name: {
            required: true,
            minlength: 3
          },
          email: {
            required: true,
            email: true
          },
          mobile: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10
          },
          password: {
            required: true,
            minlength: 6
          }
        },
        messages: {
          name: {
            required: "Please enter your name",
            minlength: "Name must be at least 3 characters"
          },
          email: {
            required: "Please enter your email",
            email: "Please enter a valid email"
          },
          mobile: {
            required: "Please enter your mobile number",
            digits: "Only digits allowed",
            minlength: "Mobile number must be 10 digits",
            maxlength: "Mobile number must be 10 digits"
          },
          password: {
            required: "Please enter a password",
            minlength: "Password must be at least 6 characters"
          }
        },
        submitHandler: function(form) {
          form.submit(); 
        }
      });
    });
  </script>

</body>
</html>
