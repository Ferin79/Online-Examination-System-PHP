<?php
    include("./db.inc.php");
    if(isset($_GET['id']))
    {
        $id = ($_GET['id']);
        header("Content-type: image/jpeg");
        $query = "SELECT ques_pic FROM exam_live WHERE questionid = ?";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
            echo "SQL Error";
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($rows = mysqli_fetch_assoc($result))
            {
                echo $rows['ques_pic'];
            }
            exit;
        }
    }
?>