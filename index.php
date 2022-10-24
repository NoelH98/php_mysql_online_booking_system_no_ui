<?php

include "config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
	
	<h4 class="my-5"> This is a list of our events...</h4>
	
	<div class="form">
<h2>View Events</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>E.No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Description</strong></th>
<th><strong>Venue</strong></th>
<th><strong>Max attendance</strong></th>
<th><strong>Ticket price</strong></th>
<th><strong>Ticket type</strong></th>
<th><strong>Book</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from events ORDER By id;";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["description"]; ?></td>
<td align="center"><?php echo $row["venue"]; ?></td>
<td align="center"><?php echo $row["max_attendance"]; ?></td>
<td align="center"><?php echo $row["ticket_price"]; ?></td>
<td align="center"><?php echo $row["ticket_type"]; ?></td>

<td align="center">
<a href="reserve.php?id=<?php echo $row["id"]; ?>">Book</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
	
</body>
</html>