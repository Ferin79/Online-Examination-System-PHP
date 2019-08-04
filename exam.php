<?php
session_start();
$flag = 0;
$email = $_SESSION['email'];
require 'includes/db.inc.php';
if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

            .form-container {
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0px 0px 10px 0px;
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
                            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>"><?php echo ($page + 1) ?></a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 2); ?>"><?php echo ($page + 2) ?></a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 3); ?>"><?php echo ($page + 3) ?></a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 4); ?>"><?php echo ($page + 4) ?></a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 5); ?>"><?php echo ($page + 5) ?></a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>">Next</a></li>
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
                    <form method="POST" action="cal_result.inc.php">
                        <table class="table">
                            <tr>
                                <td>#</td>
                                <td>Question</td>
                            </tr>
                            <?php
                            echo "this is page " . $page;
                            $len = 1;
                            $query = "SELECT * FROM exam_question;";
                            $stmt = mysqli_stmt_init($conn);
                            mysqli_stmt_prepare($stmt, $query);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            while ($rows = mysqli_fetch_assoc($result)) {
                                $query = "SELECT * FROM questionmaster WHERE questionid = ?;";
                                $stmt = mysqli_stmt_init($conn);
                                mysqli_stmt_prepare($stmt, $query);
                                mysqli_stmt_bind_param($stmt, "s", $rows['questionid']);
                                mysqli_stmt_execute($stmt);
                                $result1 = mysqli_stmt_get_result($stmt);
                                while ($ferin = mysqli_fetch_assoc($result1)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $len ?></td>
                                        <?php
                                        echo '<td><img src="data:image/jpeg;base64,' . base64_encode($ferin["ques_pic"]) . '"/></td>';
                                        $len = $len + 1;
                                        ?>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="radio"><label>A</label>
                                            <input type="radio"><label>B</label>
                                            <br>
                                            <input type="radio"><label>C</label>
                                            <input type="radio"><label>D</label>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }
                            ?>
                        </table>
                        <button class="btn btn-success">Previous Question</button>
                        <button class="btn btn-success">Next Question</button>
                        <br>
                        <br>
                        <button class="btn btn-primary">Submit Exam</button>
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