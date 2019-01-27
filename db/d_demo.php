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
$MturkToken = $_POST['MturkToken'];
$age = $_POST["age"];
$sex = $_POST["sex"];
$musicTrain_yr = $_POST["training_yr"];
$musicTrain_min = $_POST["training_min"];
$education = $_POST["education"];
$ExpComments = $_POST['ExpComments'];
$MAAB_Response = $_POST["MAABResponse"];
$inattention = $_POST["inattentionP4"];

// SQL - to demographics table
$sql = "INSERT INTO `Demo-test` (uid, MturkFourNum ,`D-MAAB-Response`, age , sex, musicTrain_yr, musicTrain_min , education , ExpComments ,`D-startTime`, `D-finishedTime`, `D-inattention`) VALUES ('$uid', '$MturkToken', '$MAAB_Response', '$age', '$sex', '$musicTrain_yr', '$musicTrain_min' , '$education', '$ExpComments', '$startTime', '$finishedTime', '$inattention')";

// SQL - updating finishing time
$sql_udate_time = "UPDATE `user-profile_test` SET  `time-end` = '$finishTime' WHERE uid = '$uid'";
$conn->query($sql_udate_time);

// SQL - updating the data of status table 
$sql_udate_status = "UPDATE `user-status_test` SET q4_Demo = '1' WHERE uid = '$uid'";
$conn->query($sql_udate_status);

// close and heading to next page
$path = "/~hsiang/index.html";

if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."Fail to connect the server，please contect the developer: hchs981809@gmail.com:";
}

?>