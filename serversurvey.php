<?php
session_start();

//initialize variables
$SHOPID  = "";
$SHOPNAME = "";
$CUSTNAME = "";
$SHOPDESCR = "";
$DATE = "";
$TIME = "" ;

$edit_state = false;

$db= mysqli_connect('localhost', 'root', '', 'loginsystem');

if(isset($_POST['save'])){
$SHOPID = $_POST['SHOPID'];
$SHOPNAME = $_POST['SHOPNAME'];
$CUSTNAME = $_POST['CUSTNAME'];
$SHOPDESCR = $_POST['SHOPDESCR'];
$DATE = $_POST['DATE'];
$TIME = $_POST['TIME'];


$query= "INSERT INTO survey(SHOPID, SHOPNAME, CUSTNAME, SHOPDESCR, DATE, TIME) VALUES('$SHOPID', '$SHOPNAME', '$CUSTNAME', '$SHOPDESCR', '$DATE', '$TIME')";
mysqli_query($db, $query);
$_SESSION['msg']= "Address saved";

header('location: survey.php'); // redirect to next page after inserting
}

//update records
if(isset($_POST['update'])){
$SHOPID =($_POST['SHOPID']);
$SHOPNAME= ($_POST['SHOPNAME']);
$CUSTNAME= ($_POST['CUSTNAME']);
$SHOPDESCR = ($_POST['SHOPDESCR']);
$DATE= ($_POST['DATE']);
$TIME= ($_POST['TIME']);
							

mysqli_query($db, "UPDATE survey SET SHOPID='$SHOPID', SHOPNAME='$SHOPNAME', CUSTNAME='$CUSTNAME',SHOPDESCR='$SHOPDESCR', DATE='$DATE', TIME='$TIME' WHERE SHOPID='$SHOPID'");

$_SESSION ['msg']= "Address updated";
header('location: survey.php');
}
//delete records
if(isset($_GET['del'])){
	$SHOPID = $_GET['del'];
	mysqli_query($db, "DELETE FROM survey WHERE SHOPID='$SHOPID' ");
	$_SESSION['msg'] = "Address deleted";
	header('location: survey.php');
}


$results= mysqli_query($db, "SELECT * FROM survey13122");
?>