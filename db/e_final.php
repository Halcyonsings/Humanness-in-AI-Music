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

// receiving variables
$MturkToken = $_POST['MturkToken'];

// SQL - to demographics table
$sql = "INSERT INTO `C1_Final` (uid, MturkFourNum ) VALUES ('$uid', '$MturkToken')";

// SQL - updating the data of status table 
$sql_udate_status = "UPDATE `C1_user-status` SET q5_Final = '1' WHERE uid = '$uid'";
$conn->query($sql_udate_status);

// close and heading to next page
$path = "https://www.mturk.com/";

if ($conn->query($sql) === TRUE) {
    header("Location:". $path);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."Fail to connect the server，please contect the developer: hchs981809@gmail.com:";
}

?>