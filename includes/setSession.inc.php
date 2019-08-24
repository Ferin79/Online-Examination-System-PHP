<?php
session_start();
require 'db.inc.php';
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
$query = "SELECT * FROM exam_info LIMIT 1";
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
        $time_exam = $rows['time'];
    }
}
$_SESSION['duration'] = $time_exam;
$_SESSION['start_time'] = date("Y-m-d H:i:s");
$end_time=$end_time = date('Y-m-d H:i:s',strtotime('+'.$_SESSION['duration'].'minutes',strtotime($_SESSION["start_time"])));
$_SESSION['end_time'] = $end_time;
header("Location:../exam.php?page=1");