<?php
    session_start();
    $admin = "ferinpatel79@gmail.com";
    require('./includes/db.inc.php');

    if(isset($_SESSION['log_in']) && isset($_SESSION['log_in']) == true)
    {
        if($_SESSION['email'] == $admin)
        {
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
                    <title>Generate Codes</title>
                    <style>
                        *
                        {
                            padding:0;
                            margin:0;
                            box-sizing:border-box;
                        }
                        .header
                        {
                            padding:50px;
                            text-align:center;
                        }
                        label 
                        {
                            font-size:20px;
                        }
                        #nom
                        {
                            width:200px;
                            font-size:25px;
                        }
                        .showCodes
                        {
                            height:500px;
                            width:75%;
                        }
                        .showCodes h3
                        {
                            color:black;
                            text-align:center;
                            padding:5px;
                        }
                        @media(max-width:900px)
                        {
                            .showCodes
                            {
                                padding-top:50px;
                            }
                        }
                    </style>
                </head>
                <body>
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

                    
                    <div class="header">
                        <h1>Generate Coupons Code</h1>
                    </div>
                    <div class="container main">
                        <div class="row">
                            <div class="col-12  col-sm-6">
                                <form action="./includes/GenerateCodes.inc.php" method="post">
                                    <label>Enter number of Coupons:</label>
                                    <br>
                                    <input type="number" name="nom" id="nom">
                                    <br>
                                    <br>
                                    <br>
                                    <input type="submit" id="thuglife" class="btn btn-primary" value="Generate Coupons">
                                </form>
                            </div>
                            <div class="col-12  col-sm-6 showCodes">
                                <h1 style="padding-bottom:20px;text-align:center;font-size:30px;color:blue;">Available Coupon Codes<h1>
                                <?php
                                    $query = "SELECT * FROM check_register";

                                    $stmt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($stmt,$query))
                                    {
                                        echo "SQL Error";
                                    }
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    $len = mysqli_num_rows($result);
                                    if($len < 1)
                                    {
                                        echo "<h5 style='text-align:center;'>No Coupons Codes Available</h5>";
                                    }
                                    else
                                    {

                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            ?>
                                                <h3><?php echo $row['couponcode'] ?></h3>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
            <?php
        }
        else
        {
            header("Location:/login.php?error=accessdenied");
        }
    }
    else
    {
        header("Location:/login.php?error=loginplease");
    }
?>