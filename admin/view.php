<?php
// Include config file
include "config.php";

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Events</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Home</a> 
<a href="insert.php">Insert New Event</a> 
<a href="logout.php">Logout</a></p>
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
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
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
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>