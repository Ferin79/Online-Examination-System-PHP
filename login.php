<?php
if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) 
{
    header("Location:/index.php");
} 
else 
{
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
        <title>Login</title>
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

                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Developer</a>
                </li>

            </ul>
            </div>
        </nav>
        <br>
        <br>
        <br>
        <br>
        <div class="conatiner-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-3">
                    <form class="form-container" action="includes/login.inc.php" method="POST">
                        <h3 class="text-center font-weight-bold">Sign In</h3>
                        <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "empty") {
                                echo '<p class="error">Empty Field! Please Fill in empty Field</p>';
                            } else if ($_GET['error'] == "nouser") {
                                echo '<p class="error">NO ACCOUNT FOUND!!!!!</p>';
                            } else if ($_GET['error'] == "accessdenied") {
                                echo '<p class="error">You Need Admin Acoount to Access This Page</p>';
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="login_submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
}
?>