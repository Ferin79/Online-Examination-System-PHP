<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Career Education</title>
    <style>
        body 
        {
            padding:0px;
            margin:0px;
            background: url("images/background.jpg");
            background-repeat: :no-repeat;
            background-size:cover;
        }
        .logo {
            padding-top: 25px;
            padding-bottom:25px;
        }
        .welcome 
        {
            font-size: 40px;
            position: absolute;
            top:35%;
            left:35%;
        }
    </style>
</head>

<body>
    <div class="logo">
        <h1>CAREER EDUCATION</h1>
    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Online Exam</a>
                </li>
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
                    <a class="nav-link" href="#">Developer</a>
                </li>

            </ul>
        </div>
    </nav>
    <div class="hi">
        <?php
            if(isset($_SESSION['log_in']) && $_SESSION['log_in'] == true)
            {
                  ?>
                  <h2 class="welcome">Welcome <?php echo $_SESSION['name'] ?></h2>
                  <?php
            }
            else 
            {
                  ?>
                  <h2 class="welcome">Welcome To Career Education</h2>
                  <?php 
            }
        ?>
    </div>
</body>

</html>