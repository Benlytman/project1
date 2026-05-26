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
    <link rel="stylesheet" href="login.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
</head>
<body>
    <form method="post" action="login.php">
       <div class="container">
    <h2>log in</h2> 
    <label>email:</label>
    <input type="text" name="email" placeholder="enter your email" required><br>
     <label>password:</label>
    <input type="password" name="password" placeholder="enter your password" required><br>
    <button type="submit" value="log in" name="login">log in</button>
    <p>don't have an account? <a href="regster.php">register here</a></p>
   </div>
    </form> 
      
</body>
</html>


<?php
if(empty($_POST["email"])){
    echo"email cant be empty";
}


elseif(empty($_POST["password"])){
    echo"input your password";
}
else{
   
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query="SELECT * FROM staff WHERE email='$email' AND  password ='$password';";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
    $user_data=mysqli_fetch_assoc($result);
    
     $_SESSION["email"] = $email;
     $_SESSION["password"] = $password;
     $_SESSION["staff_full_name"] = $user_data["staff_full_name"];
        header("location:home.php");
        exit();
    }else{
        echo"invalid email or password";
    }
}
     
   ?>     