<?php
    if(isset($_POST['register_submit']))
    {
        require 'db.inc.php';

        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatpass = $_POST['repeat_password'];


        if(empty($name) || empty($email) || empty($password) || empty($repeatpass))
        {
            header("Location:../register.php?error=empty&fullname=".$name."&email=".$email);
            exit();
        }
        else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
        {
            header("Location:../register.php?error=invalidemail&fullname=".$name);
            exit();
        }
        else if($password !== $repeatpass)
        {
            header("Location:../register.php?error=passmatch&fullname=".$name."&email=".$email);
            exit();
        }
        else {
            $query = "INSERT INTO `student_login`(`fullname`, `email`, `password`) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$query))
            {
                header("Location:../register.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt,"sss",$name,$email,$password);
                mysqli_stmt_execute($stmt);
                header("Location:../register.php?register=success");
                exit();
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else {
        header("Location:../register.php");
    }
?>