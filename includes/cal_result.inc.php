<?php
session_start();
require 'db.inc.php';
$email = $_SESSION['email'];
$query = mysqli_query($conn,"SELECT * FROM exam_record WHERE email = '$email'");
$result = mysqli_num_rows($query);
if($result>0)
{
    $n = 1;
}
else
{
    $query = "INSERT INTO exam_record (`email`,`marks`,`correct`,`wrong`,`notattemted`) VALUES (?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL Error";
        echo mysqli_stmt_error($stmt);
    }
    else 
    {
        $def = 0;
        mysqli_stmt_bind_param($stmt,"sssss",$email,$def,$def,$def,$def);
        mysqli_stmt_execute($stmt);
    }
    $n = 0;
}
if(isset($_POST['cal_result']))
{
    $page = $_GET['page'];
    $ans = $_POST[$page];
    $questionid = $_SESSION['curr_questionid'];
    unset($_SESSION['curr_questionid']);
    $query = "SELECT answer FROM questionmaster WHERE questionid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL Error";
    }
    else 
    {
        mysqli_stmt_bind_param($stmt,"s",$questionid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($rows = mysqli_fetch_assoc($result))
        {
            if($ans == 0)
            {
                echo "not";
               $query = "UPDATE exam_record SET notattemted = (notattemted + 1) WHERE email = ?;";
               $stmt = mysqli_stmt_init($conn);
               if(mysqli_stmt_prepare($stmt,$query))
               {
                   mysqli_stmt_bind_param($stmt,"s",$email);
                   mysqli_stmt_execute($stmt);
               }
               else 
               {
                   echo mysqli_stmt_error($stmt);
               }
            }
            else if ($ans != $rows['answer'])
            {
                echo "wrong";
                $query = "UPDATE exam_record SET wrong = (wrong + 1) WHERE email = ?;";
                $stmt = mysqli_stmt_init($conn);
                if(mysqli_stmt_prepare($stmt,$query))
                {
                    mysqli_stmt_bind_param($stmt,"s",$email);
                    mysqli_stmt_execute($stmt);
                }
                else 
               {
                   echo mysqli_stmt_error($stmt);
               }
            }
            else if ($ans == $rows['answer'])
            {
                echo "right";
                $query = "UPDATE exam_record SET correct = (correct + 1) WHERE email = ?;";
                $stmt = mysqli_stmt_init($conn);
                if(mysqli_stmt_prepare($stmt,$query))
                {
                    mysqli_stmt_bind_param($stmt,"s",$email);
                    mysqli_stmt_execute($stmt);
                }
                else 
               {
                   echo mysqli_stmt_error($stmt);
               }
            }
        }
    }
    $page++;   
    header("Location:../exam.php?page=$page"); 
}
else
{
    echo "Here";
}
?>