<?php

if(!isset($_SESSION)){ session_start(); } // To avoid session expiration, force loading session

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
$finishedTime = date("Y-m-d H:i:s");

// Mturk code pass through PHP
$MturkToken = $_POST['MturkToken'];
$_SESSION["MturkToken"] = $_POST['MturkToken'];

// receiving variables
// Page 1
$listening_hours = $_POST["listening_hours"]; // question 1
$spend_money = $_POST["spend_money"]; // question 2
$source = $_POST["source"]; // question 3
$self_image = $_POST["self_image"]; // question 4
$instrument = $_POST["instrument"]; // question 5
$musicTrain_yr = $_POST["training_yr"]; // question 6
$musicTrain_min = $_POST["training_min"]; // question 7
$music_experience = $_POST["music_experience"]; // question 8
$genre = $_POST["Genre_response"]; // question 9

// Page 2
$age = $_POST["age"];
$sex = $_POST["sex"];
$ZipCode = $_POST["ZipCode"];
$education = $_POST["education"];
$race = $_POST["race"];
$ExpComments = $_POST['ExpComments'];
$inattention = $_POST["inattentionP4"];

$music_experience = str_replace("'", "''", $music_experience);
// Add this line to avoid insert error which occurs when subjects type ' in $ExpComments
$ExpComments = str_replace("'", "''", $ExpComments);

// SQL - to demographics table
$sql = "INSERT INTO `C2_Demo` (uid, musicListen_hr, cost, source, self_image, instrument, musicTrain_yr, musicTrain_min, music_experience,
 genre, age , sex, zip_code, education, race, Exp_Comments, `D-finishedTime`, `D-inattention`, MturkNum) VALUES
 ('$uid', '$listening_hours', '$spend_money', '$source', '$self_image', '$instrument', '$musicTrain_yr', '$musicTrain_min', '$music_experience',
  '$genre', '$age', '$sex', '$ZipCode', '$education', '$race','$ExpComments', '$finishedTime', '$inattention', '$MturkToken')";

// SQL - updating finishing time
$sql_udate_time = "UPDATE `C2_user-profile` SET  `time-end` = '$finishedTime' WHERE uid = '$uid'";
$conn->query($sql_udate_time);

// SQL - updating the data of status table 
$sql_udate_status = "UPDATE `C2_user-status` SET q4_Demo = '1' WHERE uid = '$uid'";
$conn->query($sql_udate_status);

// close and heading to next page
$path = "/~hsiang/C2_5_final.php";

if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."Fail to connect the server，please contect the developer: hchs981809@gmail.com:";
}

?>