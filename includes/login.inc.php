<?php

if(isset($_POST['login_submit']))
{
    require 'db.inc.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password))
    {
        header("Location:../login.php?error=empty");
        exit();
    }
    else 
    {
        $query = "SELECT * FROM student_login WHERE email = ? AND password = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
            header("Location:../login.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"ss",$email,$password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $num = mysqli_num_rows($result);

            while($rows = mysqli_fetch_assoc($result))
            {
                $name = $rows['fullname'];
            }
            if($num == 1)
            {
                header("Location:../index.php");
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['log_in'] = true;
                $_SESSION['name'] = $name;
                exit();
            }
            else {
                header("Location:../login.php?error=nouser");
                exit();
            }
        }
    }
}
else {
    header("Location:../login.php");
    exit();
}