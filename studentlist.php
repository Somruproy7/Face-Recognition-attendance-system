<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        body {
      background-image: linear-gradient(to right, #2193b0, #6dd5ed);
      
    }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 50px 0;
        }
        thead th {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 20px;
            font-size: 18px;
            text-align: left;
        }
        tbody td {
            border: 1px solid black;
            padding: 20px;
            text-align: left;
            vertical-align: middle;
            font-size: 16px;
        }
        tbody td img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; margin-bottom: 50px;">Student List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "attendence");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch data from the database
            $sql = "SELECT user_id, name, dob, address, image FROM student_profile";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["user_id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["dob"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row["image"]) . "'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' style='text-align: center;'>No records found</td></tr>";
            }

            // Close the connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>

