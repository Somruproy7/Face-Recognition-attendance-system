<?php include 'header.php';?>
<script>
function myFunction() {
  alert("I am an alert box!");
}
</script>
<?php
  $result = '';
  if(isset($_POST['submit'])) {
    $video = $_FILES['video']['tmp_name'];
    $new_name = "video2.".pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
    $destination = 'videos/'.$new_name;
    //$destination = 'videos/'.$_FILES['video']['name'];
    move_uploaded_file($video, $destination);
    

    // Call the Python script to process the video
    $output = shell_exec('python AttendanceProject.py '.$destination);

    // Store the result
    $result = trim($output);
  }
  $conn = mysqli_connect('localhost', 'root', '', 'attendence');
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Fetch the employee details
  $sql = "SELECT * FROM student_profile WHERE user_id = '$result'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $student_id = $row['user_id'];
      $student_name = $row['name'];
      $student_add = $row['dob'];
      $student_image = $row['image'];
    }
  } else {
    echo "<h2>Student Details</h2>";
    
  }
  
  // Close the connection
  mysqli_close($conn);
?>

<html>
  <head>
    <title>Video Attendance</title>
    <style type="text/css">
      .form-container {
        text-align: center;
        padding: 20px;
      }

      .form-container input[type="file"] {
        padding: 10px 20px;
        background-color: #ddd;
        border: none;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
      }

      .form-container input[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
      }

      .profile-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px;
      }

      .profile-picture {
        border-radius: 50%;
        height: 100px;
        width: 100px;
        margin-right: 20px;
      }

      .profile-info {
        text-align: left;
      }

      .profile-info label {
        font-weight: bold;
        margin-right: 10px;
      }

      .profile-buttons {
        text-align: center;
        margin-top: 20px;
      }

      .profile-button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: black;
        border: none;
        border-radius: 5px;
        margin: 10px;
        cursor: pointer;
      }
      h2 {
        text-align: center;
      }
      body{
        background-image: linear-gradient(to right, #2193b0, #6dd5ed);
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="video">
        <input type="submit" name="submit" value="Submit Video">
      </form>
    </div>

    <?php
      if(isset($result) && mysqli_num_rows($result) > 0) {
        echo "<h2>Student Details</h2>";
        echo "<div class='profile-container'>";
        echo "<img class='profile-picture' src='data:image/jpeg;base64,".base64_encode($student_image)."' alt='Profile Picture' height='100' width='100'>";
        echo "  <div class='profile-info'>";
        echo "    <p><label>Student ID: </label>".$student_id."</p>";
        echo "    <p><label>Student Name: </label>".$student_name."</p>";
        echo "    <p><label>DOB: </label>".$student_add."</p>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='profile-buttons'>";
        echo "  <a class='profile-button' href='attendance_taken.php'>Confirm</a>";
        echo "  <a class='profile-button' href='attendence.php'>Cancel</a>";
        echo "</div>";
        
      }
      if(isset($_POST['confirm'])) {
        $student_id = $_POST['student_id'];
        $date = date("Y-m-d");
      
        $conn = mysqli_connect('localhost', 'root', '', 'attendence');
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "INSERT INTO attendance (student_id, date) VALUES ('$student_id', '$date')";
        if (mysqli_query($conn, $sql)) {
          echo "Attendance taken successfully.";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
      }
      
    ?>
  </body>
</html>
