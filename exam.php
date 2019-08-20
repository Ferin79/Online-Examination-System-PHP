<?php
session_start();
$flag = 0;
$email = $_SESSION['email'];
require 'includes/db.inc.php';
if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) 
{
    $query = "SELECT * FROM exam_live;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) 
    {
        echo "SQL Error";
    } 
    else 
    {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_num_rows($result);
        $len = $rows;
    }
    if (isset($_GET['page'])) 
    {
        $page = $_GET['page'];
    } 
    else 
    {
        $page = 1;
    }
    
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script>
            window.history.forward();
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Exam</title>
        <style>
            body {
                padding: 0px;
                margin: 0px;
                background: url("images/background.jpg") no-repeat 50% 50%;
                background-position: center;
            }

            .logo {
                padding-top: 25px;
                padding-bottom: 25px;
            }

            form {
                background: #fff;
            }

            .error {
                font-size: 15px;
                color: red;
            }

            .success {
                font-size: 15px;
                color: green;
            }

            .question {
                position: absolute;
                top: 50%;
                left: 25%;
                font-size: 30px;
            }

            table {
                background: lightskyblue;
            }

            tr td {
                border: 2px solid black;
            }

            input[type=radio] {
                width: 20px;
                height: 20px;
            }

            label {
                font-size: 30px;
            }

            .link {
                font: bold 1rem Arial;
                text-decoration: none;
                background-color: #ffc107;
                color: black;
                font-weight: 400;
                padding: 8px;
                border-top: 1px solid #CCCCCC;
                border-right: 1px solid #333333;
                border-bottom: 1px solid #333333;
                border-left: 1px solid #CCCCCC;
                border-radius: .25rem;
            }
        </style>
    </head>

    <body>
        <div class="logo">
            <h1>CAREER EDUCATION</h1>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse" id="collapse_target">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="confirm.php">Online Exam</a>
                    </li>
                    <?php
                    if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.ferinpatel.ml">Developer</a>
                    </li>

                </ul>
            </div>
        </nav>
        <br>
        <br>
        <br>
        <div class="conatiner">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            if ($page > 1) {
                                ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page - 1); ?>">Previous</a></li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($page + 1 <= $rows) {
                                ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>"><?php echo ($page + 1) ?></a></li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($page + 2 <= $rows) {
                                ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 2); ?>"><?php echo ($page + 2) ?></a></li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($page + 3 <= $rows) {
                                ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 3); ?>"><?php echo ($page + 3) ?></a></li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($page + 4 <= $rows) {
                                ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 4); ?>"><?php echo ($page + 4) ?></a></li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($page + 5 <= $rows) {
                                ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 5); ?>"><?php echo ($page + 5) ?></a></li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($page + 6 <= $rows) {
                                ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>">Next</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <form method="POST" action="includes/cal_result.inc.php?page=<?php echo $page ?>">
                        <table class="table">
                            <tr>
                                <td>#</td>
                                <td>Question</td>
                                <td>Marks</td>
                            </tr>
                            <?php
                            $page--;
                            $query = "SELECT * FROM exam_live LIMIT $page,1;";
                            $page++;
                            $stmt = mysqli_stmt_init($conn);
                            mysqli_stmt_prepare($stmt, $query);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            while ($rows = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $page ?></td>
                                    <?php
                                    $_SESSION['curr_questionid'] = $rows['questionid'];
                                    $_SESSION['mark_per'] = $rows['mark'];
                                    echo '<td><img class="img-fluid" src="data:image/jpeg;base64,' . base64_encode($rows['ques_pic']) . '" /></td>';
                                    ?>
                                    <td><?php echo $rows["mark"] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="radio" id="optionA" value="1"  name='<?php echo  $page ?>'><label for="optionA">A</label>
                                        <br>
                                        <input type="radio" id="optionB" value="2"  name='<?php echo  $page ?>'><label for="optionB">B</label>
                                        <br>
                                        <input type="radio" id="optionC" value="3"  name='<?php echo  $page ?>'><label for="optionC">C</label>
                                        <br>
                                        <input type="radio" id="optionD" value="4"  name='<?php echo  $page ?>'><label for="optionD">D</label>
                                        <input type="radio" id="default" value="0" style="visibility:hidden;" checked name='<?php echo $page ?>'><label style="visibility:hidden;">default</label>
                                        </td>
                                    <td></td>
                                </tr>
                            </table>
                            <?php
                            }
                            ?>
                    <div class="option">
                        <?php
                        if($page < $len)
                        {
                            ?>
                             <button type="submit" class="btn btn-primary" name="cal_result">Save and Next</button>
                             <br>
                            <br>
                            <p><a class="btn btn-warning" href="exam.php?page=<?php echo $page+1 ?>">Skip And Next</a></p>
                            <?php
                        }
                        else 
                        {
                            ?>
                            <button type="Submit" class="btn btn-success" name="result">Complete Exam</button>
                            <?php
                        } 
                        ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </body>

    </html>
<?php
} else {
    header("Location:/login.php?error=loginplease");
    exit();
}
?>