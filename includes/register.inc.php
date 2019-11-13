<?php
    if(isset($_POST['register_submit']))
    {
        require 'db.inc.php';

        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $code = $_POST['code'];
        $password = $_POST['password'];
        $repeatpass = $_POST['repeat_password'];


        if(empty($name) || empty($email) || empty($code) || empty($password) || empty($repeatpass))
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

            $SelectQuery = "SELECT * FROM check_register WHERE couponcode = ?";
            $DeleteQuery = "DELETE FROM check_register WHERE id = ?";

            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$SelectQuery))
            {
                echo "SQL Error";
            }
            mysqli_stmt_bind_param($stmt,"s",$code);
            mysqli_stmt_execute($stmt);

            $res = mysqli_stmt_get_result($stmt);
            while($rows = mysqli_fetch_assoc($res))
            {
                if($rows['couponcode'] == $code)
                {
                    echo $rows['couponcode'];
                    $stmt2 = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt2,$DeleteQuery))
                    {
                        header("Location:../register.php?error=sqlerror");
                    }
                    mysqli_stmt_bind_param($stmt2,"s",$rows['id']);
                    mysqli_stmt_execute($stmt2);


                    $query = "INSERT INTO `student_login` (`fullname`, `email`, `password`) VALUES (?,?,?)";
                    $stmt3 = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt3,$query))
                    {
                        header("Location:../register.php?error=sqlerror");
                    }
                    else 
                    {
                        mysqli_stmt_bind_param($stmt3,"sss",$name,$email,$password);
                        mysqli_stmt_execute($stmt3);

                        header("Location:../register.php?register=success");
                    }
                }

            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else {
        header("Location:../register.php");
    }
?>