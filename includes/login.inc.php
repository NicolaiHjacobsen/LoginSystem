<?php

if(isset($_POST['login-submit']))
{

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if(empty($mailuid) || empty($password))
    {
        header("Location: ../top.php?error=emptyfields".$mailuid);
        exit();
    }
    else
    {
        $sql = "SELECT * FROM users WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../top.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);


            if($row = mysqli_fetch_assoc($result))
            {
                $passwordCheck = password_verify($password, $row['password']);

                if($passwordCheck == false)
                {
                    header("Location: ../top.php?error=wrongPassword");
                    exit();
                }
                else if($passwordCheck == true)
                {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['usernameId'] = $row['username'];

                    header("Location: ../index.php?login=success");
                    exit();
                }
                else
                {                    
                    header("Location: ../top.php?error=wrongPassword");
                    exit();
                }
            }
            else
            {
                header("Location: ../top.php?error=noUser");
                exit();
            }
        }
    }

}
else
{
    header("Location: ../top.php");
    exit();
}