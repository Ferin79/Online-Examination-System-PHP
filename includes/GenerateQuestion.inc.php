<?php
if(isset($_POST['add_exam']))
{
    require 'db.inc.php';
    
    $classid = $_POST['classid'];
    $subjectid = $_POST['subjectid'];
    $chapterid = $_POST['chapterid'];
    $ques_type = $_POST['ques_type'];
    $numberQues = $_POST['ques_num'];
    $negMark = $_POST['neg_marks'];

    echo "classid = ".$classid." subjectid = ".$subjectid." chapterid = ".$chapterid." ques_type = ".$ques_type." number of question = ".$numberQues;

    $query = "SELECT * FROM questionmaster WHERE classid = ? AND subjectid = ? AND chapterid = ? AND questiontype = ? ORDER BY rand() LIMIT ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL Error";
    }
    else 
    {
        mysqli_stmt_bind_param($stmt,"sssss",$classid,$subjectid,$chapterid,$ques_type,$numberQues);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while($rows = mysqli_fetch_assoc($result))
        {
           echo "<br>";
           echo $rows['questionid']."<br>";
           $query = "INSERT INTO `exam_live`(`questionid`, `answer`, `mark`, `ques_pic`, `sol_pic`) VALUES (?,?,?,?,?);";
           mysqli_stmt_prepare($stmt,$query);
           mysqli_stmt_bind_param($stmt,"sssss",$rows['questionid'],$rows['answer'],$rows['mark'],$rows['ques_pic'],$rows['sol_pic']);
           mysqli_stmt_execute($stmt);
        }
        $query = "INSERT INTO `neg_marks`(`neg`) VALUES (?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
           echo "SQL Error";
        }
        else {
            mysqli_stmt_bind_param($stmt,"s",$negMark);
            mysqli_stmt_execute($stmt);
        }
        header("Location:../GenerateQuestion.php?success=add");
    } 
}
else 
{
    header("Location:../GenerateQuestion.php");
}