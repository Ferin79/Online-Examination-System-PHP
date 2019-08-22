<?php
session_start();
$admin = "ferinpatel79@gmail.com";
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
    <title>Career Education</title>
    <style>
        body 
        {
            padding:0px;
            margin:0px;
            background: url("images/background.jpg") no-repeat;
            background-size:center;
        }
        .logo {
            padding-top: 25px;
            padding-bottom:25px;
        }
        .welcome 
        {
            font-size: 40px;
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
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

                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Online Exam</a>
                </li>
                <?php
                        if(isset($_SESSION['log_in']) && $_SESSION['log_in'] == true)
                        {
                            if($_SESSION['email'] == $admin)
                            {   
                  ?>
                        <li class="nav-item">
                        <a class="nav-link" href="/AddQuestion.php">Add Question</a>
                        </li>
                  <?php
                            }
                        }
                  ?>
                  <?php
                        if(isset($_SESSION['log_in']) && $_SESSION['log_in'] == true)
                        {
                            if($_SESSION['email'] == $admin)
                            {   
                  ?>
                        <li class="nav-item">
                        <a class="nav-link" href="GenerateQuestion.php">Take Exam</a>
                        </li>
                  <?php
                            }
                        }
                  ?>
                   <?php
                        if(isset($_SESSION['log_in']) && $_SESSION['log_in'] == true)
                        {
                            if($_SESSION['email'] == $admin)
                            {   
                  ?>
                        <li class="nav-item">
                        <a class="nav-link" href="#">See Result</a>
                        </li>
                  <?php
                            }
                        }
                  ?>
                  <?php
                        if(isset($_SESSION['log_in']) && $_SESSION['log_in'] == true)
                        {
                            if($_SESSION['email'] == $admin)
                            {   
                  ?>
                        <li class="nav-item">
                        <a class="nav-link" href="confirmAdmin.php">Edit Confirm</a>
                        </li>
                  <?php
                            }
                        }
                  ?>
                  <?php
                        if(isset($_SESSION['log_in']) && $_SESSION['log_in'] == true)
                        {
                  ?>
                        <li class="nav-item">
                        <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                        </li>
                  <?php
                        }
                        else {

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
    <br>
    <br>
    <div>
        <h1>Sorry You Can Apper For Exam Once Only !!! </h1>
    </div>
    <div style="width:100%;height:100%;position:absolute;left:35%;top:50%;"><iframe src="images/only_once.gif" width="75%" height="75%" style="position:absolute" frameBorder="0" class="giphy-embed"></iframe></div>
    <br>
    <br>
    <br>
</body>

</html>