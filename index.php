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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Gravity Education</title>
    <style>
        *
        {
            padding:0px;
            margin:0px;
            box-sizing:border-box;
        }
        body 
        {
            padding:0px;
            margin:0px;
            background: #fff;
        }
        .logo {
            padding-top: 25px;
            padding-bottom:25px;
        }
        .intro 
        {
            height:100vh;
            width:100%;
        }
        .introHead 
        {
            height:80vh; 
            display:flex;
            flex-direction:column;
            justify-content:center;
        }
        .introHead h1
        {
            font-size:90px;
        }
        .introHead h3
        {
            font-size:40px;
        }
        .welcome 
        {
            font-size: 55px;
            color:#007bff;
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
        }
        .carousel-control-next-icon, .carousel-control-prev-icon
        {
            height:40px;
            width:40px;
        }
        .carousel-caption 
        {
            background-color:gray;
            color:white:
        }
        .carousel-item{
            height: 600px;
        } 
        .carousel-item img{
            height: 600px;
        }
        .classroom 
        {
            text-align:center;
            padding:50px;
        }
        .text 
        {
            text-align:center;
        }
        .icon
        {
            display:flex;
            justify-content:center;
            align-items:center;
            padding-bottom:50px;
        }
        .aboutGravity 
        {
            height:600px;
            width:100%;
            background-color:#29cff0;
        }
        .label_gravity
        {
            padding-top:50px;
            padding-bottom:100px;
            text-align:center;
            color:white;
        }
        .about_text 
        {
            color:white;
            text-align:left;
            font-size:20px;
        }
        .about_logo 
        {
            font-size:50px;
        }
        .footerMain
        {
            width:100%;
            height:45vh;
            margin-top:50px;
            background:#2d3436;
            color:white;
            text-align:center;
        }
        .iconsHere
        {
            width:75%;
            height:30vh;
            display:flex;
            justify-content:space-evenly;
            align-items:center;
        }
        .iconsHere i 
        {
            transition: 0.2s ease-in-out;
        }
        .iconsHere i:hover 
        {
            cursor:pointer;
            transform:translateY(-20px);
            color:lightblue;
        }
        .icon-cog {
            color: pink;
        }
        .navbar-dark .navbar-nav .nav-link 
        {
            font-size: 18px;
            color: rgba(255,255,255,.5);
        }
        .moreInfo 
        {
            width:25%;
            text-align:center;
            padding-top:50px;
            color:white;
        }
        @media (max-width: 768px)
        {
            .aboutGravity 
            {
                height:850px;
                width:100%;
                background-color:#29cff0;
            }
            .about_text 
            {
                color:white;
                text-align:left;
                font-size:15px;
            }
            .label_gravity
            {
                padding-top:50px;
                padding-bottom:100px;
                text-align:center;
                color:white;
            }
            .about_logo 
            {
                font-size:35px;
            }
            .introHead h1
            {
                font-size:60px;
            }
            .introHead h3 
            {
                font-size:20px;
            }
            .introHead 
            {
                height:20vh;
            }
            .introImg img
            {
                padding-top:50px;
                height:350px;
                width:350px;
            }
            .footerMain
            {
                width:100%;
                height:80vh;
                margin-top:50px;
                background:#2d3436;
                color:white;
                text-align:center;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="collapse_target">
            <ul class="navbar-nav">

                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="confirm.php">Online Exam</a>
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
                        <a class="nav-link" href="AdminResult.php">See Result</a>
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
    <div class="intro">
        <div style="padding-top:50px;" class="container">
            <div class="row">
                <div class="col introHead">
                    <h1>Gravity</h1>
                    <h3>Education Center</h3>
                </div>
                <div class="col introImg">
                    <img src="./images/header.svg" height="550px" width="550px" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <h1 class="classroom">CLASSROOM COURSES</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="icon">
                    <img src="./images/atom (1).png" height="150px" width="150px" alt="image">
                </div>
                <div class="text">
                    <h3>Physics</h3>
                    <p>Physics, the study of matter and energy, is an ancient and broad field of science.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="icon">
                    <img src="./images/chemistry.png" height="150px" width="150px" alt="image">
                </div>
                <div class="text">
                    <h3>Chemistry</h3>
                    <p>Chemistry is a branch of science that involves the study of the composition, structure and properties of matter.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="icon">
                    <img src="./images/calculator.png" height="150px" width="150px" alt="image">
                </div>
                <div class="text">
                    <h3>Mathematics</h3>
                    <p>Mathematics is the science that deals with the logic of shape, quantity and arrangement. </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="icon">
                    <img src="./images/dna.png" height="150px" width="150px" alt="image">
                </div>
                <div class="text">
                    <h3>Biology</h3>
                    <p>Biologists study the structure, function, growth, origin, evolution and distribution of living organisms. </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="icon">
                    <img src="./images/engineering.png" height="150px" width="150px" alt="image">
                </div>
                <div class="text">
                    <h3>JEE Main & Advance</h3>
                    <p>Joint Entrance Examination is an engineering entrance examination conducted for admission to various engineering colleges in India.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="icon">
                    <img src="./images/doctor.png" height="150px" width="150px" alt="image">
                </div>
                <div class="text">
                    <h3>NEET</h3>
                    <p>The National Eligibility cum Entrance Test is an entrance examination conducted for admission to various medical college in India</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="aboutGravity">
        <div class="container">
            <div class="row">
                <div class="col col-sm-6 col-md-12">
                    <div class="label_gravity">
                        <h3 class="about_logo">Gravity Education Center</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-6 col-md-12">
                    <div class="about_text">
                        <p>A premier coaching institute for the preparation of JEE (Main+Advanced), JEE (Main), Pre-Medical (AIPMT (NEET-UG)/ AIIMS). The Institute is well regarded for the high quality entrance exams preparation and produces best results year after year. At Gravity, we focus on building a strong foundation of knowledge and concepts in students for their success and provide an excellent platform for the preparation of competitive exams and board level education. The core values of Determination, Honesty, Authenticity, Integrity, Devotion, Humanism, Holistic Learning, Social Ethics, and concern for society & environment are all closely interwoven into the fiber of our academic programs. Our highly qualified and most experienced faculties are dedicated and committed to student’s complete success and provide assistive surroundings to contribute to their social, cultural, academic and all-round development.
                        To our students, we impart value-based career education, abundant resources, and individual attention. To the parents, we have a responsibility to nurture ethical and responsible career leadership in the children. To the society, we provide a lifelong connection to ethics and excellence in global leaders.
                        </p>
                    <div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="icon">
                    <img src="./images/classroom.png" height="150px" widht="150px" alt="">
                </div>
                <div class="text">
                    <h1><span class="counter">5</span> <span>+<span></h1>
                    <h4>Faculties</h4>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="icon">
                    <img src="./images/discussion.png" height="150px" widht="150px" alt="">
                </div>
                <div class="text">
                    <h1><span class="counter">150</span> <span>+<span></h1>
                    <h4>Students</h4>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="icon">
                    <img src="./images/student.png" height="150px" widht="150px" alt="">
                </div>
                <div class="text">
                    <h1><span class="counter">75</span> <span>+<span></h1>
                    <h4>More than 80% Marks Student</h4>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <div class="footerMain">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 iconsHere">
                    <i class="fa fa-4x icon-cog fa-facebook"></i>
                    <i class="fa fa-4x icon-cog fa-instagram"></i>
                    <i class="fa fa-4x icon-cog fa-phone"></i>
                    <i class="fa fa-4x icon-cog fa-envelope"></i>
                </div>
                <div class="col-12 col-sm-6 moreInfo">
                    <h5>Address:</h5>
                    <p>Kim Surat</p>

                    <h5>Phone:</h5>
                    <p>+91 77780 16568</p>

                    <h5>Email:</h5>
                    <p>umangpatel5067@gmail.com</p>

                </div>
            </div>
        </div>
        <br>
        All Copyright Reserved.
        <br>
        Ferin Patel
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha256-JtQPj/3xub8oapVMaIijPNoM0DHoAtgh/gwFYuN5rik=" crossorigin="anonymous"></script>
</body>

</html>