<?php 
if(isset($_POST['Clear_exam']))
{
    require 'db.inc.php';
    
    $query = "TRUNCATE TABLE `exam_question`;";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL Error";
    }
    else 
    {
        mysqli_stmt_execute($stmt);
    }

    $query = "TRUNCATE TABLE `curr_exam`;";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL Error";
    }
    else 
    {
        mysqli_stmt_execute($stmt);
    }

    $query = "TRUNCATE TABLE `neg_marks`;";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL Error";
    }
    else 
    {
        mysqli_stmt_execute($stmt);
    }

    $query = "TRUNCATE TABLE `exam_info`;";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL Error";
    }
    else 
    {
        mysqli_stmt_execute($stmt);
    }
    header("Location:../GenerateQuestion.php?success=clear");
}
else 
{
    header("Location:../index.php");
}
?>