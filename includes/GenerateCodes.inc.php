<?php
    require("./db.inc.php");
    $nom = $_POST['nom'];

    $query = "INSERT INTO check_register (couponcode) VALUE (?)";
     

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL Error";
        header("Location:../GenerateCode.php");
    }
    for($i = 0;$i<$nom;$i++)
    {
        $var = random_strings(12);
        mysqli_stmt_bind_param($stmt,"s", $var);
        mysqli_stmt_execute($stmt);
    }

    function random_strings($length_of_string) 
    { 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
        return substr(str_shuffle($str_result),  
                        0, $length_of_string); 
    }
    header("Location:../GenerateCode.php");
?>