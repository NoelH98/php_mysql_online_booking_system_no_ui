<?php

// Include config file
require_once "config.php";

$status = "";

if(isset($_POST['new']) && $_POST['new']==1){
    
    $name =$_REQUEST['name'];
    $description = $_REQUEST['description'];
	$venue = $_REQUEST['venue'];
	$max_attendance = $_REQUEST['max'];
	$ticket_price = $_REQUEST['price'];
	$ticket_type = $_REQUEST['type'];
	$amount_rem = $max_attendance;

    $ins_query="insert into events
    (`name`,`description`,`venue`,`max_attendance`,`ticket_price`,`ticket_type`,`amount_rem`)values
    ('$name','$description','$venue','$max_attendance','$ticket_price','$ticket_type','$amount_rem')";
    mysqli_query($link,$ins_query)
    or die(mysql_error());
    $status = "New Event Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Event</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Events</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Insert New Event</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="name" placeholder="Enter Event Name" required /></p>
<p><input type="text" name="description" placeholder="Enter Event Description" required /></p>
<p><input type="text" name="venue" placeholder="Enter Event Venue" required /></p>
<p><input type="text" name="max" placeholder="Enter Event Max attendance" required /></p>
<p><input type="text" name="price" placeholder="Enter Event Ticket Prices" required /></p>
<p><input type="text" name="type" placeholder="Enter Event Ticket type" required /></p>


<p><input name="submit" type="submit" value="Submit" /></p>

</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>