<?php
session_start();

include "P3_db_config.php";

// variables in session
$_SESSION["uid"] = $_POST["uid"];
// TODO:
$_SESSION["userObj"] = $_POST["userObj"];

// input basic info of user
$uid = $_POST["uid"];
$ip = $_POST["ip"];
$browser = $_POST["browser"];
$start_time = $_POST["start_time"];
// TODO:
// $user_object = $_POST["userObj"];
$inattention = $_POST["inattentionP0"];
$Forget_Hypothesis = $_POST["ForgetHypothesis"];

// config of database - Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->set_charset("utf8");//set the charset

// Insert profile data
$sql = "INSERT INTO `P3_user-profile` (uid, ip, browser, `time-start`, `inattention-P0`, `forget-hypothesis`) VALUES ('$uid', '$ip', '$browser', '$start_time','$inattention', '$Forget_Hypothesis')";

// initiating status table
$sql_status_init = "INSERT INTO `P3_user-status` (uid) VALUES ('$uid')";
$conn->query($sql_status_init);

// close and heading to next page
$path = "../P3_1_headphone.php";
if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>