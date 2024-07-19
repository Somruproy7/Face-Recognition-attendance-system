<?php include 'header.php';?>
<html>
<head>
  <title>Attendance Taken</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <style>
    body {
      background-image: linear-gradient(to right, #2193b0, #6dd5ed);
        font-family: Arial, sans-serif;
        color: #FFFFFF;
        
      }
      h2 {
       text-align: center;
       font-size: 50px;
       margin-top: 150px;
       margin-bottom: 50px;
       color: white;
      }
      .buttons {
        display: flex;
        justify-content: center;
        margin-top: 50px;
      }
      .button {
        background-color: #4CAF50;
        color: #FFFFFF;
        border: none;
        border-radius: 25px;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      .button:hover {
        background-color: #4CAF50;
        color: #FF69B4;
      }
    </style>
</head>
<body>
<script>
           alert('Attendence Captured Sucessfully');
           
            </script>
  <h2>Attendance Taken</h2>
  <div class="buttons">
    <button class="button" onclick="window.location.href='attendence.php'">Take More</button>
    <button class="button" onclick="window.location.href='home.php'">Return Home</button>
  </div>
</body>
</html>
