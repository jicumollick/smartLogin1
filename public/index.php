
<?php


require "../private/autoload.php";

$user_data = check_login($connection);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>

<div id="header">
<div>Hi <?php echo $_SESSION['username']; ?> </div>
<div ><a href="logout.php">Logout</a> </div>


</div>



  
</body>
</html>