<?php
session_start();

include "E1_db_config.php";

// variables in session
$_SESSION["uid"] = $_POST["uid"];
// TODO:
$_SESSION["userObj"] = $_POST["userObj"];

// input basic info of user
$uid = $_POST["uid"];
$ip = $_POST["ip"];
$Email = $_POST["Email"];
$browser = $_POST["browser"];
$start_time = $_POST["start_time"];
$TW_start = date("Y-m-d H:i:s");
// TODO:
// $user_object = $_POST["userObj"];
$inattention = $_POST["inattentionP0"];

// config of database - Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->set_charset("utf8");//set the charset

// Insert profile data
$sql = "INSERT INTO `E1_user-profile` (uid, ip, email, browser, `time-start`, `Taiwan-start`, `inattention-P0`) VALUES ('$uid', '$ip', '$Email', '$browser', '$start_time', '$TW_start','$inattention')";

// initiating status table
$sql_status_init = "INSERT INTO `E1_user-status` (uid) VALUES ('$uid')";
$conn->query($sql_status_init);

// close and heading to next page
$path = "../E1_1_headphone.php";
if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>