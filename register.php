<?php
require_once 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $passwordConfirmation = $_POST['password-confirmation'];

 if($password != $passwordConfirmation) {
  die("Error: Passwords do not march.");
 }
 $hashed_password = password_hash($password, PASSWORD_DEFAULT);

 $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
 $stmt->bind_param("sss", $name, $email, $hashed_password);

 if($stmt->execute()) {
  echo "Registration successful!";
 } else {
  echo "Error: " . $stmt->error;
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
 <title>Authentication</title>

 <style>
  li {
   margin-bottom: 10px
  }
 </style>

</head>

<body>
 <h1>REGISTER</h1>

 <form action="register.php" method="post">
  <ul>
   <li>
    <label for="name">Name :</label>
    <input type="text" name="name" id="name">
   </li>
   <li>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email">
   </li>
   <li>
    <label for="password">Password :</label>
    <input type="password" name="password" id="password">
   </li>
   <li>
    <label for="password-confirmation">Confirmation password :</label>
    <input type="password" name="password-confirmation" id="password-confirmation">
   </li>

   <li>
    <button type="submit" value="Register">Register</button>
   </li>

   <br>
     <li>
     <a href="login.php">If you have account can login here!</a>
   </li>
  </ul>
 </form>
</body>

</html>