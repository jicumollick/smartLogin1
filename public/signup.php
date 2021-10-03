
<?php



require "../private/autoload.php";
$error = "";

if($_SERVER['REQUEST_METHOD']=="POST"){

    // form posted and collect the form data 

  

    $email = $_POST['email'];
    if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email)){
        $error = " Please Enter a valid email";
    }
    $username = esc($_POST['username']);

    $password = esc($_POST['password']);

    $date = date('y-m-d H:i:s');

    $url_address = get_random_string(60);

    if($error == ""){    

        $arr['url_address']= $url_address;
        $arr['username'] = $username;
        $arr['password'] = $password;
        $arr['email'] = $email;
        $arr['date'] = $date;

        //  $query = "insert into users (url_address,username,password,email,date) values ('$url_address','$username','$password','$email','$date')";
 
    $query = "INSERT INTO users (url_address,username,password,email,date) VALUES (:url_address,:username,:password,:email,:date)";

    $stm= $connection->prepare($query);

    $stm->execute($arr);

    header('location: login.php');
    die();

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>

    <style type="text/css">

    form {
        margin:auto;
        padding: 6px;
        border: solid thin #aaa;
        max-width: 200px;
    }

    #title {
        background-color: #39b799;
        padding: 1rem;
        text-align:center;
        color:white;
    }

        #text {
            height:25px;
            border-radius: 5px;
            padding:4px;
            border:solid thin #aaa;
            width:100%;
        }

        #button {
            padding:10px;
            width:100px;
            color:white;
            background-color:lightblue;
            border:none;
        }

        #box {
            background-color:grey;
            margin:auto;
            width:300px;
            padding:20px;
        }

        #textbox{

            border:solid thin #aaa;
            margin-top:4px;
            width:98%;
            padding: 10px;
            
        }

    </style>
</head>
<body style="font-family: verdana">

<div id="box">
    <form action="" method="POST">
        <div>
            <?php
            if(isset($error) && $error != ""){

                echo $error;

            }
            ?>
        </div>
        <div id="title">SignUp</div>
        <input id="textbox"  type="text" name="username" placeholder="username" required> <br> <br>

        <input id="textbox"  type="email" name="email" placeholder="email" required> <br> <br>
        <input id="textbox" type="password" name="password" placeholder="password" required> <br> <br>
        <input id="button" type="submit" name="submit" value="Signup"> <br> <br>
        <a href="login.php">Click to Login</a>

    </form>
</div>
    
</body>
</html>