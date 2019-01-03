#!/usr/local/bin/php
<?php

date_default_timezone_set('America/Los_Angeles'); 

$time_stamp=time();


$database = "map.db";          

try  
{     
     $db = new SQLite3($database);
}
catch (Exception $exception)
{
    echo '<p>There was an error connecting to the database!</p>';

    if ($db)
    {
        echo $exception->getMessage();
    }
        
}

$table="markers";

//$sql = "SELECT * FROM $table";

//$result = $db->query($sql);

//$record = $result->fetchArray(SQLITE3_ASSOC);

//  $sql = "SELECT count(*) FROM $table";
//  $result = $db->query($sql);
//  $record=$result->fetchArray();
//  $number = $record['count(*)'];



// Gets data from URL parameters.
$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];
$rating= $_GET['rating'];

// Inserts new row with place data.

$sql ="INSERT INTO $table ('time', 'name', 'address', 'lat', 'lng', 'type', 'rating') VALUES ('$time_stamp', '$name', '$address', '$lat', '$lng', '$type', '$rating')"; 

  $result = $db->query($sql);

print "$name~$address~$lat~$lng~$type~$time_stamp~$rating";

?>
