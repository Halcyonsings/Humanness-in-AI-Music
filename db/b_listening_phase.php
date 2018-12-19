<?php

if(!$_SESSION){ session_start(); } // To avoid session expiration, force loading session

require_once "db_config.php";

// db connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Fail to connect the server，please contect the developer: hchs981809@gmail.com:" . $conn->connect_error);
};
$conn->set_charset("utf8");//set the charset

// receiving variables
$uid = $_SESSION['uid'];
$startTime = $_SESSION['startTime'];
$finishedTime = date("Y-m-d H:i:s");
// echo $startTime;

// receiving variables
$playTime = $_POST["playTime"];
$allAnswers = $_POST["allAnswers"];
$inattention = $_POST["inattentionP2"];


$sql = "INSERT INTO Listening_test (uid, `L-playTime`, `L-allAnswers`,`L-startTime`, `L-finishedTime` , `L-inattention`) VALUES ('$uid', '$playTime', '$allAnswers', '$startTime', '$finishedTime', '$inattention')";



// close and heading to next page
$path = "/~hsiang/3_mind_perception_scale.php";

if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."Fail to connect the server，please contect the developer: hchs981809@gmail.com:";
}

?>