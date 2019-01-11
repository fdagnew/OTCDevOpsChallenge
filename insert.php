<?php
$dbname = 'fdagnew';
$dbuser = 'fdagnew';
$dbpass = 'akfrtusa1';
$dbhost = 'fdagnew.csb0mnscoyjp.us-west-2.rds.amazonaws.com';

$mysqli = new mysqli("fdagnew.csb0mnscoyjp.us-west-2.rds.amazonaws.com", "fdagnew", "akfrtusa1", "fdagnew");
 
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

 
// Escape user inputs for security
$first_name = $link->real_escape_string($_REQUEST['first_name']);
$last_name = $link->real_escape_string($_REQUEST['last_name']);
$email = $link->real_escape_string($_REQUEST['email']);
 
// attempt insert query execution
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
if($link->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$link->close();
?>