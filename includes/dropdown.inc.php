<?php
require 'db.inc.php';
$classid = $_GET['classid'];
$subjectid = $_GET['subjectid'];
if ($classid != "") 
{
    $query = "select * from subject where classid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        echo "Error in fetching";
    } 
    else 
    {
        mysqli_stmt_bind_param($stmt, "s", $classid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        echo "<select id='subjectid' name='subjectid' onchange='affect_chapter()'>";
        echo "<option value = '0'>Select Subject</option>";
        while ($rows = mysqli_fetch_assoc($result)) 
        { 
            echo "<option value='$rows[subjectid]'>"; echo $rows['subjectname']; echo "</option>";
        }
        echo "</select>";
    }
}
if ($subjectid != "") 
{
    $query = "select * from chapter where subjectid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        echo "Error in fetching";
    } 
    else 
    {
        mysqli_stmt_bind_param($stmt, "s", $subjectid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        echo "<select id='subjectid' name='chapterid'>";
        echo "<option value = '0'>Select Chapter</option>";
        while ($rows = mysqli_fetch_assoc($result)) 
        { 
            echo "<option value='$rows[chapterid]'>"; echo $rows['chaptername']; echo "</option>";
        }
        echo "</select>";
    }
}
