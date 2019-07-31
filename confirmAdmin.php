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
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Edit Confirm Page</title>
            <style>
                body {
                    padding: 0px;
                    margin: 0px;
                    background: url("images/background.jpg");
                    background-repeat: :no-repeat;
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
                #output_image 
                {
	                max-width: 200px;
                }
                #output_image1 
                {
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
                    if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) {
                        if ($_SESSION['email'] == $admin) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="GenerateQuestion.php">Take Exam</a>
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
                                <a class="nav-link" href="#">See Result</a>
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
            <br>
            <div class="contanier-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-md-3">
                        <form class="form-container" action="includes/confirmEdit.inc.php" method="POST">
                            <h3 class="text-center font-weight-bold">Edit Confirm Page</h3>

                            <?php
                            if(isset($_GET['success']))
                            {
                                if($_GET['success'] == "done")
                                {
                                    echo "<p class='success'>Confirm Page Saved Successfully</p>";
                                }
                            }
                            ?>

                            <div class="form-group">
                            <label for="exampleInputEmail1">Exam Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Exam Name" name="name">
                            </div>

                            <div class="form-group">
                            <label for="exampleInputEmail2">Total Number of Question</label>
                            <input type="number" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter Total Number of Question" name="no_exam">
                            </div>

                            <div class="form-group">
                            <label for="exampleInputEmail3">Total Exam Timing (in SEC)</label>
                            <input type="number" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Enter Exam Time In SECOND" name="exam_time">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block" name="submit_confirm">Save Confrim Page</button>

                        </form>
                    </div>
                </div>
            </div>
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