<?php include 'header.php';?>
<?php     
     $host = "localhost";  
     $user = "root";  
     $password = '';  
     $db_name = "attendence";  
       
     $con = mysqli_connect($host, $user, $password, $db_name);  
     if(mysqli_connect_errno()) {  
         die("Failed to connect with MySQL: ". mysqli_connect_error());  
     }    
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: home.php");  
        }  
        else{  
            echo "<script>
           alert('There are no fields to generate a report');
           window.location.href='index.php';
            </script>";
        }     
?>  
