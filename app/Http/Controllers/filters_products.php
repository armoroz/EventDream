<?php
// Get the selected venue types
if(isset($_GET['venuetype'])){
  $venueTypes = implode("','", $_GET['venuetype']);
  $venueTypes = "'".$venueTypes."'";
}else{
  $venueTypes = "";
}

// Get the selected venue locations
if(isset($_GET['venuelocation'])){
  $venuelocation = implode("','", $_GET['venuelocation']);
  $venuelocation = "'".$venuelocation."'";
}else{
  $venuelocation= "";
}

// Get the selected venue quantity range
if(isset($_GET['venuequantity'])){
  $venueQuantity = implode(",", $_GET['venuequantity']);
}else{
  $venueQuantity = "";
}

// Construct the SQL query
$sql = "SELECT * FROM venue WHERE 1=1";
if($venueTypes != ""){
  $sql .= " AND venuetype IN ($venueTypes)";
}
if($venueLocations != ""){
  $sql .= " AND venuelocation IN ($venueLocations)";
}
if($venueQuantity

if (isset($venue) && isset($venue->venueimages)) {
  // Access the $venue->venueimages property here
}