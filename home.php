<?php include 'header.php';?>
<!DOCTYPE html>
<html>
<head>
  <title>Attendance System</title>
  <style>
    body {
      background-image: linear-gradient(to right, #2193b0, #6dd5ed);
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    h1 {
      color: white;
      margin-bottom: 50px;
    }
    button {
      padding: 20px 40px;
      background-color: white;
      color: #2193b0;
      border-radius: 50px;
      border: none;
      font-size: 20px;
      font-weight: bold;
      margin: 20px;
      cursor: pointer;
      box-shadow: 0px 10px 20px rgba(33,147,176,0.3);
    }
    button:hover {
      background-color: #2193b0;
      color: white;
    }
  </style>
</head>
<body>
  <h1>Attendance System</h1>
  <button onclick="window.location.href='attendence.php'">Take Attendance</button>
  <button onclick="window.location.href='upload-profile.php'">Add New Student</button>
  <button onclick="window.location.href='studentlist.php'">Students List</button>
</body>
</html>

