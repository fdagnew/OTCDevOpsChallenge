<?php
$dbname = 'fdagnew';
$dbuser = 'fdagnew';
$dbpass = 'akfrtusa1';
$dbhost = 'fdagnew.csb0mnscoyjp.us-west-2.rds.amazonaws.com';

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$first_name = $mysqli->real_escape_string($_REQUEST['first_name']);
$last_name = $mysqli->real_escape_string($_REQUEST['last_name']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
 
// attempt insert query execution
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";


if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
	
	
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>