<?php
// Include config file
include "config.php";


$id=$_REQUEST['id'];
$query = "DELETE FROM events WHERE id=$id"; 
$result = mysqli_query($link,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>