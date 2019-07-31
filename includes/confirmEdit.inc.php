<?php
require 'db.inc.php';

$name = $_POST['name'];
$number = $_POST['no_exam'];
$exam_time = $_POST['exam_time'];

$query = "INSERT INTO exam_info (`name`,`number`,`time`) VALUES (?,?,?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$query))
{
    echo "SQL Error";
}
else {
    mysqli_stmt_bind_param($stmt,"sss",$name,$number,$exam_time);
    mysqli_stmt_execute($stmt);
    header("Location:../confirmAdmin.php?success=done");
}
?>