<?php
session_start();
$admin = "ferinpatel79@gmail.com";
if (isset($_SESSION['log_in']) && isset($_SESSION['log_in']) == true) {
    if ($_SESSION['email'] == $admin) {
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
            <title>Generate Question</title>
            <style>
                body {
                    padding: 0px;
                    margin: 0px;
                    background: url("images/background.jpg");
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                }

                .logo {
                    padding-top: 25px;
                    padding-bottom: 25px;
                }

                .welcome {
                    font-size: 40px;
                    position: absolute;
                    top: 35%;
                    left: 35%;
                }

                #output_image {
                    max-width: 200px;
                }

                #output_image1 {
                    max-width: 200px;
                }

                .error {
                    font-size: 20px;
                    font-weight: bold;
                    color: red;
                }

                .success {
                    font-size: 20px;
                    font-weight: bold;
                    color: green;
                }
            </style>
        </head>

        <body>
            <div class="logo">
                <h1>GRAVITY EDUCATION CENTER</h1>
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

                    <li class="nav-item">
                        <a class="nav-link" href="confirm.php">Online Exam</a>
                    </li>
                    <?php
                    if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) {
                        if ($_SESSION['email'] == $admin) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="AddQuestion.php">Add Question</a>
                            </li>
                        <?php
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) {
                        if ($_SESSION['email'] == $admin) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="AdminResult.php">See Result</a>
                            </li>
                        <?php
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                        </li>
                    <?php
                    } else {

                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
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
            <div class="conatiner-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-md-3">
                        <form class="form-container" action="includes/AddQuestion.inc.php" method="POST" enctype='multipart/form-data'>
                            <h3 class="text-center" style="color:lightblack;font-size:50px">Take Exam</h3>
                            <?php
                            if (isset($_GET['success'])) {
                                if ($_GET['success'] == "clear") {
                                    echo '<p class="success">All Old Exam Data is Clear</p>';
                                }
                                if ($_GET['success'] == "add") {
                                    echo '<p class="success">Question Added To Exam</p>';
                                }
                            }
                            ?>
                            <div class="form-group">
                                <label>Select Class</label>
                                <select id="classid" name="classid" class="classid form-control" onchange="affect_subject()">
                                    <option value="0" selected>Select Class</option>
                                    <?php
                                    require 'includes/db.inc.php';
                                    $query = "select * from class";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $query)) {
                                        header("Location:../AddQuestion.php?error=sqlerror");
                                        exit();
                                    } else {
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $rows['classid']  ?>"><?php echo $rows['classname'] ?></option>
                                        <?php
                                        }
                                    }

                                    ?>
                                </select>
                                <label>Select Subject</label>
                                <select id="subjectid" name="subjectid" class="subjectid form-control" onchange="affect_chapter()">
                                    <option value="0" selected>Select Subject</option>
                                </select>
                                <label>Select Chapter</label>
                                <select id="chapterid" name="chapterid" class="chapterid form-control">
                                    <option value="0" selected>Select Subject</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Question Type</label>
                                <select id="ques_type" name="ques_type" class="ques_type form-control">
                                    <option value="0">Easy</option>
                                    <option value="1">Hard</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Enter Number of Question</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Number of Question" name="ques_num">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Negative Marking</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Negative Marks" name="neg_marks">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="add_exam" formmethod="POST" formaction="includes/GenerateQuestion.inc.php">Add Questions To Exam</button>
                            <button type="submit" class="btn btn-danger btn-block" name="Clear_exam" formmethod="POST" formaction="includes/ClearDB.inc.php">Clear Old Exam From Database</button>
                        </form>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <script>
                    function affect_subject() {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.open("GET", "includes/dropdown.inc.php?classid=" + document.getElementById("classid").value, false);
                        xmlhttp.send(null);
                        document.getElementById("subjectid").innerHTML = xmlhttp.responseText;
                    }

                    function affect_chapter() {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.open("GET", "includes/dropdown.inc.php?subjectid=" + document.getElementById("subjectid").value, false);
                        xmlhttp.send(null);
                        document.getElementById("chapterid").innerHTML = xmlhttp.responseText;
                    }
                </script>
        </body>

        </html>
    <?php
    } else {
        header("Location:/login.php?error=accessdenied");
    }
} else {
    header("Location:/login.php?error=loginplease");
    exit();
}
?>