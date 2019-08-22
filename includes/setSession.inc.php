<?php
session_start();
require 'includes/db.inc.php';
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
echo "here";
header("Location:exam.php?page=1");