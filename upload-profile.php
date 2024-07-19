<?php
if(isset($_POST['submit'])) {
    // Database credentials
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "attendence";

    // Connect to the database
    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the uploaded image and details
    $profileImage = $_FILES['image']['tmp_name'];
    $profileImage = addslashes(file_get_contents($profileImage));
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    
    
    $profileImageName = "$id.jpg";
    move_uploaded_file($_FILES["image"]["tmp_name"], "Images_Attendance/$profileImageName");

    

    // Insert the details and profile image into the database
    $sql = "INSERT INTO student_profile ( user_id, name, dob, address, image)
            VALUES ('$id', '$name', '$dob', '$address', '$profileImage')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Details and profile photo uploaded successfully.');
        window.location.href='home.php'</script>";
    } else {
        echo "Error uploading details and profile photo: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Details and Profile Photo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: linear-gradient(to right, #2193b0, #6dd5ed);
        }
        
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 0;
        }
        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            padding: 50px;
            padding: bottom 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        input[type="text"], input[type="date"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: #0b2348;
            color: white;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #4CAF50;
        }
        h2 {
       text-align: center;
       font-size: 20px;
       margin-top: 30px;
       color: white;
      }
    </style>
</head>
<body>
        <h2>Enter Student Details</h2>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="user_id" placeholder="Enter your Id">
            <input type="text" name="name" placeholder="Enter your Name">
            <input type="date" name="dob" placeholder="Enter your DOB">
            <input type="text" name="address" placeholder="Enter your address">
            <input type="file" name="image" accept="image/*">
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
</body>
</html>
