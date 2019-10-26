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
$finishedTime = date("Y-m-d H:i:s");
// echo $startTime;

// receiving variables
$AC_Response = $_POST["ACResponse"];
$MP_Response = $_POST["Response"];
$MP_ResponseTime = $_POST["ResponseTime"];
$inattention = $_POST["inattentionP3"];



$sql = "INSERT INTO C3_MP (uid, `AC-Response`,`MP-Response`, `MP-RT`, `MP-finishedTime`, `ACMP-inattetion`) VALUES ('$uid', '$AC_Response', '$MP_Response', '$MP_ResponseTime', '$finishedTime', '$inattention')";


// SQL - updating the data of status table 
$sql_udate_status = "UPDATE `C3_user-status` SET q3_ACMP = '1' WHERE uid = '$uid'";
$conn->query($sql_udate_status);

// close and heading to next page
$path = "/~hsiang/C3_4_demographics.php";

if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."Fail to connect the server, please contect the developer: hchs981809@gmail.com:";
}

?>