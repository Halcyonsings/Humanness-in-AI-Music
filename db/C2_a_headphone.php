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
$didPass = $_POST["didPass"];
$totalCorrect = $_POST["totalCorrect"];
$inattention = $_POST["inattentionP1"];
$HCAllData = $_POST["HCAllData"];

$sql = "INSERT INTO C2_HC (uid, `HC-totalCorrect`,`HC-startTime`, `HC-finishedTime` , `HC-inattention`, `HC-All-Data`) VALUES ('$uid', '$totalCorrect', '$startTime', '$finishedTime', '$inattention', '$HCAllData')";

// SQL - updating the data of status table 
$sql_udate_status = "UPDATE `C2_user-status` SET q1_HC = '1' WHERE uid = '$uid'";
$conn->query($sql_udate_status);


// close and heading to next page
$path = "../C2_2_listening_phase_radio.php";

if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."Fail to connect the server, please contect the developer: hchs981809@gmail.com:";
}

?>