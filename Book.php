<?php

// Include config file
include "config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$username = $_SESSION["username"];
$id=$_REQUEST['id'];
$query = "SELECT * from events where id='".$id."'"; 
$result = mysqli_query($link, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
    $ticket_amt =$_REQUEST['ticket_amt'];
    $ticket_type = $_REQUEST['ticket_type'];
	
	$query_name = "SELECT name FROM events WHERE id ='$id'";
	
	$result_t = mysqli_query($link,$query_name);
	if(mysqli_num_rows($result_t)>0){$row = mysqli_fetch_assoc($result_t);}
		
    $event_name = $row['name'];
	
	$query_max = "SELECT max_attendance FROM events WHERE id ='$id'";
	
	$result_q = mysqli_query($link,$query_max);
	if(mysqli_num_rows($result_q)>0){$row = mysqli_fetch_assoc($result_q);}
		
    $event_max = $row['max_attendance'];
	
	$rem = $event_max - $ticket_amt;
	
	$update_t="update events set amount_rem='".$rem."' where id='".$id."'";

    mysqli_query($link, $update_t) or die(mysqli_error());
	
	
$update="update users set ticket_amt='".$ticket_amt."',
ticket_type='".$ticket_type."',
event_reserv='".$event_name."' where username='".$username."'";

mysqli_query($link, $update) or die(mysqli_error());
$status = "Event Booked Successfully. </br></br>
<a href='view.php'>View Updated Events</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Book Event</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<p><a href="index.php">Back</a></p> 

<h1>Book Event</h1>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="ticket_amt" placeholder="Enter Ticket Amount" required /></p>
<p><input type="text" name="ticket_type" placeholder="Enter Ticket Type" required /></p>


<p><input name="submit" type="submit" value="Submit" /></p>

</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</body>
</html>