<?php

if(!$_SESSION){ session_start(); } // To avoid session expiration, force loading session

require_once "C2_db_config.php";

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
$allRT = $_POST["allRT"];
$inattention = $_POST["inattentionP2"];


$sql = "INSERT INTO C2_Listening (uid, `L-playTime`, `L-allAnswers`,`L-allRT`,`L-startTime`, `L-finishedTime` , `L-inattention`) VALUES ('$uid', '$playTime','$allAnswers', '$allRT', '$startTime', '$finishedTime', '$inattention')";

// SQL - updating the data of status table 
$sql_udate_status = "UPDATE `C2_user-status` SET q2_L = '1' WHERE uid = '$uid'";
$conn->query($sql_udate_status);

// close and heading to next page
$path = "/~hsiang/C2_3_mind_perception_scale.php";

if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."Fail to connect the server, please contect the developer: hchs981809@gmail.com:";
}

?>