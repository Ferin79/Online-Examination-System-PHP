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
            <title>Add Question</title>
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
                        <h3 class="text-center" style="color:lightblack;font-size:50px;">Add Question</h3>
                        <?php
                            if (isset($_GET['success'])) {
                                if ($_GET['success'] == "add") {
                                    echo '<p class="success">Question Added Successfully into Database</p>';
                                }
                            }
                            else if(isset($_GET['error']))
                            {
                                if($_GET['error'] == "fail")
                                {
                                    echo '<p class="error">SQL Error. Data Entry Failed</p>';
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
                                if(!mysqli_stmt_prepare($stmt,$query))
                                {
                                    header("Location:../AddQuestion.php?error=sqlerror");
                                    exit();
                                }
                                else 
                                {
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    while($rows = mysqli_fetch_assoc($result))
                                    {
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
                            <label for="exampleInputPassword1">Enter Question</label>
                            <input type="file" accept="image/*" id="exampleInputPassword1" name="ques_img" onchange="preview_image(event)"> 
                            <br>
                            <img id="output_image" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Enter Marks</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Marks" name="marks">
                        </div>
                        <div class="form-group">
                            <label for="exampleanswer">Correct Answer</label>
                            <select id="answer" name="answer" class="answer form-control">
                                <option value="0" selected>Select</option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Enter Solution</label>
                            <input type="file" accept="image/*" id="exampleInputPassword1" name="sol_img" onchange="preview_image1(event)"> 
                            <br>
                            <img id="output_image1" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="add_question" formmethod="POST" formaction="includes/AddQuestion.inc.php">Add</button>
                    </form>
                </div>
            </div>
            <br>
            <br>
            <br>
            <script>
                function affect_subject()
                {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("GET","includes/dropdown.inc.php?classid="+document.getElementById("classid").value,false);
                    xmlhttp.send(null);
                    document.getElementById("subjectid").innerHTML = xmlhttp.responseText;
                }
                function affect_chapter()
                {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("GET","includes/dropdown.inc.php?subjectid="+document.getElementById("subjectid").value,false);
                    xmlhttp.send(null);
                    document.getElementById("chapterid").innerHTML = xmlhttp.responseText;
                }
                function preview_image(event) 
                {
		            var reader = new FileReader();
		            reader.onload = function() 
                    {
			            var output = document.getElementById('output_image');
			            output.src = reader.result;
		            }
		            reader.readAsDataURL(event.target.files[0]);
	            }

	            function preview_image1(event) 
                {
		            var reader = new FileReader();
		            reader.onload = function() 
                    {
                        var output = document.getElementById('output_image1');
                        output.src = reader.result;
		            }
		            reader.readAsDataURL(event.target.files[0]);
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