<?php

if(!isset($_SESSION)){ session_start(); } // To avoid session expiration, force loading session

require_once "C3_db_config.php";

// db connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Fail to connect the server，please contect the developer: hchs981809@gmail.com:" . $conn->connect_error);
};
$conn->set_charset("utf8");//set the charset

// receiving variables
$uid = $_SESSION['uid'];
$repeated = $_SESSION['count'];
$finishedTime = date("Y-m-d H:i:s");
// echo $startTime;

// receiving variables
$playTime = $_POST["playTime"];
$allAnswers = $_POST["allAnswers"];
$allRT = $_POST["allRT"];
$inattention = $_POST["inattentionP2"];
$hurrySubject = $_POST["hurrySubject"];

$sql = "INSERT INTO C3_Listening (uid, `L-playTime`, `L-allAnswers`,`L-allRT`, `L-finishedTime`, `L-hurrySubject`, `L-inattention`, `L-reapeatedTimes`) VALUES ('$uid', '$playTime','$allAnswers', '$allRT', '$finishedTime', '$hurrySubject', '$inattention', '$repeated')";

// SQL - updating the data of status table 
$sql_udate_status = "UPDATE `C3_user-status` SET q2_L = '1' WHERE uid = '$uid'";
$conn->query($sql_udate_status);

// close and heading to next page
$path = "/~hsiang/C3_3_mind_perception_scale.php";

if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."Fail to connect the server, please contect the developer: hchs981809@gmail.com:";
}

?>