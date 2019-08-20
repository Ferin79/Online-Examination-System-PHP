<?php
    session_start();
    require 'db.in.php';
    $email = $_SESSION['email'];
    $option = array();
    if(isset($_POST['cal_result']))
    {
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
            $ans = $_POST[$page];
            $option = $_SESSION['answer'];
            $option[$page-1] = $ans;
            $_SESSION['answer'] = $option;
        }
        else
        {
            $query = "SELECT * FROM exam_live;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$query))
            {
                echo "SQL Error";
            }
            else 
            {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $rows = mysqli_num_rows($result);

                for ($i=0; $i < $rows; $i++) 
                { 
                    $option[$i] = -1;
                }
            }
            $_SESSION['answer'] = $option;
        }
        $page++;
        header("Location:../exam.php?page=$page");
    }
?>