#!/usr/local/bin/php -d display_errors=STDOUT
<?php
  // begin this XHTML page
  print('<?xml version="1.0" encoding="utf-8"?>');
  print("\n");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
<title>Accessing a SQLite 3 Database using PHP</title> 
</head>
<body>
<div>
<?php 

date_default_timezone_set('America/Los_Angeles'); 


$database = "dbjpiao.db";          


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


// define tablename and field names for a SQLite3 query to create a table in a database
$table = "event_table";
$field1 = "time";
$field2 = "name";
$field3 = "event_title";
$field4 = "event_message";


// Write code here to extract the info from $_POST data.

 $name = $_POST['person'];
 $date  = $_POST['date'];
 $time  = $_POST['time'];
 $event_title  =  $_POST['event_title'];
 $event_message = $_POST['event_message'];
 
 
 //get timestamp

    $arr1=explode("-", $date);
    $arr2=explode(":", $time);
    
    $ts=mktime($arr2[0], $arr2[1], 0, $arr1[0], $arr1[1], $arr1[2]);
 


//  Insert a new record to your database 
$sql = "INSERT INTO $table ($field1, $field2, $field3, $field4) VALUES ('$ts', '$name','$event_title', '$event_message')";

$result = $db->query($sql);

print "<h1>Database successfully updated</h1>";

print "<p><a href='http://pic.ucla.edu/~jpiao/calendar2.php'>Click here to see the calendar</a></p>";
?>


</div>
</body>
</html>
