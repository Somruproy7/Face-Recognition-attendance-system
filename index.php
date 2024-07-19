<?php include 'header.php';?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Face Recognition Attendance System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="container">
      <h1>Face Recognition Attendance System</h1>
      <form action = "authentication.php" onsubmit = "return validation()" method = "POST">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name  = "user" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name  = "pass" required>
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
  </body>
</html>
