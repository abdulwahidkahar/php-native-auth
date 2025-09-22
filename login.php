<?php
require_once 'config.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();

  $result = $stmt->get_result();

  if($result->num_rows == 1) {
   $user = $result->fetch_assoc();

   if(password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    header("Location: dashboard.php");
    exit();
   } else {
    header("Location: login.php?error=1");
    exit();
   }
  } else {
    header("Location: login.php?error=1"); 
  }

  $stmt->close();
  $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Auth Login</title>

  <style>
  li {
   margin-bottom: 10px
  }
 </style>
</head>
<body>
  <h1>LOGIN</h1>
  <form action="login.php" method="post">
  <ul>
   <li>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email">
   </li>
   <li>
    <label for="password">Password :</label>
    <input type="password" name="password" id="password">
   </li>
   <li>
    <button type="submit" value="Login">Login</button>
   </li>

   <br>
     <li>
     <a href="register.php">If you don't have account can register here!</a>
   </li>
  </ul>
 </form>
 <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>Login failed. Invalid username or password.</p>";
    }
    ?>
</body>
</html>