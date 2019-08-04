<?php
session_start();
class user
{
    public $host = "localhost";
    public $username = "root";
    public $pass = "";
    public $db_name = "online_exam";
    public $conn;
    public $cat;

    function __construct()
    {
        $this->conn = new mysqli($this->host,$this->username,$this->pass,$this->db_name);
        if($this->conn->connect_errno)
        {
            die("Connection Failed :".mysqli_connect_error());
        }
    }
    public function getquestion()
    {
        $query = $this->conn->query("SELECT * FROM exam_question;");
        while($rows = $query->fetch_assoc(MYSQLI_ASSOC))
        {
            $this->cat[]=$rows;
        }
        return $this->cat;
    }
}
?>