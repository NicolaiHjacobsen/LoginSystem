<?php

if(isset($_POST['signup-submit']))
{
    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $Password = $_POST['pwd'];
    $PasswordRepeat = $_POST['pwd-repeat'];
    $password_hash = password_hash($Password, PASSWORD_DEFAULT);

    if(empty($username) || empty($email) || empty($Password) || empty($PasswordRepeat))
    {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        header("Location: ../signup.php?error=invalidmailuid&uid");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if ($Password != $PasswordRepeat)
    {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else
    {
        $sql = " INSERT INTO `users`( `username`, `email`, `password`) 
        VALUES ('$username','$email','$password_hash')  ";
    
        if( $conn->query($sql) ) {
            // success
            header("Location: ../signup.php?signup=success");
            exit();
        } else {
            // email eller bruger findes, begge skal være unik
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
    }
}
else
{
    header("Location: ../signup.php");
    exit();
}

?>