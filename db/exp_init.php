<?php
session_start();

include "db_config.php";

// variables in session
$_SESSION["uid"] = $_POST["uid"];
$_SESSION["userObj"] = $_POST["userObj"];

// input basic info of user
$uid = $_POST["uid"];
$ip = $_POST["ip"];
$browser = $_POST["browser"];
$start_time = $_POST["start_time"];
$user_object = $_POST["userObj"];
$inattention = $_POST["userObj"];

// config of database - Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->set_charset("utf8");//set the charset

// Insert profile data
$sql = "INSERT INTO `user-profile_test` (uid, ip, browser, `time-start`, userObject, C_inattention) VALUES ('$uid', '$ip', '$browser', '$start_time', '$user_object','$inattention')";

// initiating status table
$sql_status_init = "INSERT INTO `user-status` (uid) VALUES ('$uid')";
$conn->query($sql_status_init);

// close and heading to next page
$path = "../3_mind_perception_scale.php";
if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>