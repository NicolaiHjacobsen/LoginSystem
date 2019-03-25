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

        //$sql = "SELECT uidUsers FROM users WHERE uidUseres=?";

        $sql = " INSERT INTO `users`( `username`, `email`, `password`) 
        VALUES ('$username','$email','$password_hash')  ";
    
        if( $conn->query($sql) ) {
            // success
            header("Location: ../signup.php?signup=success");
            exit();
        } else {
            // email findes hvis skal være unik
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }


     /*   $sql = "SELECT uidUsers FROM users WHERE uidUseres=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0)
            {
                header("Location: ../signup.php?error=userTaken&mail=".$email);
                exit();
            }
            else
            {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else
                {

                    $hashedPwd = password_hash($Password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    
                    header("Location: ../signup.php?signup=success");
                    exit();
                }

            }
        } */

    }

    //mysqli_stmt_close($stmt);
    //mysqli_close($conn);

}
else
{
    header("Location: ../signup.php");
    exit();
}

?>