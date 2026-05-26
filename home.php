
<?php
session_start();
echo"welcome back"



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>

</head>
<body>
    <h1>Welcome Back! <?php echo htmlspecialchars($_SESSION["staff_full_name"]); ?></h1>
   

    <p>Welcome to your dashboard!</p>
     <p>here is your track details following with what you have done ths week</p>
</body>
</html>