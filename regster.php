<?php
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "tracker_system");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <form method="post" action="regster.php">
          <label>staff full name:</label>
    <input type="text" name="staff_full_name" placeholder="enter your full name" required><br>
    
    <label>email:</label>
    <input type="text" name="email" placeholder="enter your email" required><br>
     <label>password:</label>
    <input type="password" name="password" placeholder="enter your password" required><br>
    <label> confirm password:</label>
    <input type="password" name="confirm_password" placeholder="enter your password again" required><br>
    <button type="submit" value="register" name="register">register</button>
    <p>already have an account? <a href="login.php">log in here</a></p>
    </form> 
</body>
</html>
<?php
if(isset($_POST["register"])){
    $staff_full_name = $_POST["staff_full_name"];
    $email =$_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $stmt=$conn->prepare("insert into staff(staff_full_name,email,password) values(?,?,?)");
    $stmt->bind_param("sss",$staff_full_name,$email,$password);
    if($stmt->execute()){
        echo"registration successful";
    }
    else{
        echo"registration failed";
    }
    $stmt->close();
    $conn->close();
}
    ?>  

  

    
   
    

