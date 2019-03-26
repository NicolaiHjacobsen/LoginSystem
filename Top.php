<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/overlay.css">  
</head>
<body>

<?php
        $outputhtml = '';

        if(isset($_SESSION['userId']))
        {
            
            $outputhtml = <<<HTML

            <script src="js/removeClass.js"></script>
HTML;
        }
        else
        {
            $outputhtml = <<<HTML
            <div id="overlay" class="notActive"> 
                <div class="LoginForm">
                    <h1 id="overlay-h1">LOGIN</h1>
                    <form action="includes/login.inc.php" method="POST">
                        <input class="overlay-input" id="mailuid" name="mailuid" type="text" placeholder="Username / E-mail">
                        <input class="overlay-input" id="pwd" name="pwd" type="password" placeholder="Password">
                        <button type="submit" name="login-submit" id="overlay-btn">ENTER</button>  
                    </form>
                    <div id="signup"><a href="signup.php">Signup</a></div>     
                    <P>hi</p>  
                </div>
            </div> 

            <script src="js/AddClass.js"></script>
HTML;
        }
?>

<?php

 echo $outputhtml;
 
?>


<div class="content-container">
    <div class="navbar">
        <div class="bars"><i class="fas fa-bars"></i></div>
    </div>
        <ul>
            <div><li><a href="#">HOME</a></li></div>
            <div><li><a href="#">ABOUT</a></li></div>
            <div><li><a href="#">PORTFOLIO</a></li></div>
            <div><li><a href="#">CONTACT</a></li></div>
            <form action="includes/logout.inc.php" method="POST">
            <button type="submit" id="logout-submit" name="logout-submit">Logout</button>
        </form> 
        </ul>
</div>

<script src="js/menuDrop.js"></script>

</body>

