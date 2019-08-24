<?php
    session_start();
    require 'db.inc.php';
    $email = $_SESSION['email'];
    $option = array();
    $page = 0;
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
            
        }
        echo "inside first block";
        $page++;
        header("Location:../exam.php?page=$page");
    }
    if(isset($_POST['result']))
    {
        if(isset($_GET['page']))
        {
            unset($_SESSION['start_time']);
            unset($_SESSION['end_time']);
            $i = 0;
            $correct = 0;
            $wrong = 0;
            $marks = 0.0;
            $notattemted = 0;
            $neg = 0.0;


            $page = $_GET['page'];
            $ans = $_POST[$page];
            $option = $_SESSION['answer'];
            $option[$page-1] = $ans;
            $_SESSION['answer'] = $option;
            $option = $_SESSION['answer'];
            unset($_SESSION['answer']);

            $query = "SELECT * FROM neg_marks LIMIT 1;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$query))
            {
                echo mysqli_stmt_error;
            }
            else 
            {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($rows = mysqli_fetch_assoc($result))
                {
                    $neg = (float) $rows['neg'];
                }
            }


            $query = "SELECT * FROM exam_live;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$query))
            {
                echo mysqli_stmt_error;
            }
            else 
            {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($rows = mysqli_fetch_assoc($result))
                {
                    if($option[$i] == 0)
                    {
                        $notattemted++;
                    }
                    else if($option[$i] == -1)
                    {
                        $notattemted++;
                    }
                    else if($option[$i] != $rows['answer'])
                    {
                        $wrong++;
                        $marks = $marks - $neg;
                    }
                    else if($option[$i] == $rows['answer'])
                    {
                        $correct++;
                        $marks = $marks + $rows['mark'];
                    }
                    else 
                    {

                    }
                    $i++;
                }

                $query = "INSERT INTO exam_record (`email`,`marks`,`correct`,`wrong`,`notattemted`) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$query))
                {
                    echo mysqli_stmt_error;
                }
                else 
                {
                    mysqli_stmt_bind_param($stmt,"sssss",$email,$marks,$correct,$wrong,$notattemted);
                    mysqli_stmt_execute($stmt);
                }
                header("Location:../result.php");
            }
        }
    }
?>