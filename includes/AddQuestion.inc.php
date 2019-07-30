<?php
    if(isset($_POST['add_question']))
    {
        require 'db.inc.php';
        $classid = $_POST['classid'];
        $subjectid = $_POST['subjectid'];
        $chapterid = $_POST['chapterid'];
        $ques_type = $_POST['ques_type'];
        $ques_img = addslashes(file_get_contents($_FILES['ques_img']['tmp_name']));
        $marks = $_POST['marks'];
        $answer = $_POST['answer'];
        $sol_img = addslashes(file_get_contents($_FILES['sol_img']['tmp_name']));

        $query = "INSERT INTO `questionmaster`(`classid`, `subjectid`, `chapterid`, `questiontype`, `answer`, `mark`, `ques_pic`, `sol_pic`) VALUES (?,?,?,?,?,?,?,?)";
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
            echo "SQL Error";
        }
        else 
        {
            mysqli_stmt_bind_param($stmt,"ssssssss",$classid,$subjectid,$chapterid,$ques_type,$answer,$marks,$ques_img,$sol_img);
            mysqli_stmt_execute($stmt);
            header("Location:../AddQuestion.php");    
        }
    }
    else {
        header("Location:../AddQuestion.php");
    }
?>