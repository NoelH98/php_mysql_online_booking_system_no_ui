<?php

// Include config file
include "config.php";

$id=$_REQUEST['id'];
$query = "SELECT * from events where id='".$id."'"; 
$result = mysqli_query($link, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Event</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Event</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Events</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
    $name =$_REQUEST['name'];
    $description = $_REQUEST['description'];
	$venue = $_REQUEST['venue'];
	$max_attendance = $_REQUEST['max_attendance'];
	$ticket_price = $_REQUEST['ticket_price'];
	$ticket_type = $_REQUEST['ticket_type'];
	$amount_rem = $max_attendance;
$update="update events set description='".$description."',
name='".$name."',
venue='".$venue."',max_attendance='".$max_attendance."',ticket_price='".$ticket_price."',ticket_type='".$ticket_type."',amount_rem='".$amount_rem."' where id='".$id."'";
mysqli_query($link, $update) or die(mysqli_error());
$status = "Event Updated Successfully. </br></br>
<a href='view.php'>View Updated Events</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" 
required value="<?php echo $row['name'];?>" /></p>
<p><input type="text" name="description" placeholder="Enter Description" 
required value="<?php echo $row['description'];?>" /></p>
<p><input type="text" name="venue" placeholder="Enter Venue" 
required value="<?php echo $row['venue'];?>" /></p>
<p><input type="text" name="max_attendance" placeholder="Enter Max attendance" 
required value="<?php echo $row['max_attendance'];?>" /></p>
<p><input type="text" name="ticket_price" placeholder="Enter Ticket price" 
required value="<?php echo $row['ticket_price'];?>" /></p>
<p><input type="text" name="ticket_type" placeholder="Enter Ticket type" 
required value="<?php echo $row['ticket_type'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>