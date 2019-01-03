#!/usr/local/bin/php
<?php

date_default_timezone_set('America/Los_Angeles'); 




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


$time_stamp=$_GET['time'];


  $sql = "SELECT * FROM $table WHERE time>'$time_stamp'";
  $result = $db->query($sql);
  
  $sql_query_count = "SELECT COUNT(*) as count FROM $table WHERE time>'$time_stamp'";

  //count query result to display something else if no records where found.
  $resultCount = $db->query($sql_query_count);

if ($resultCount > 0)
{  
if($result)  
{  $str="";
   while($record=$result->fetchArray(SQLITE3_ASSOC))
  { 
     $name=$record['name']; //'id', 'name', 'address', 'lat', 'LNG', 'type'
     $address=$record['address'];
     $lat=$record['lat'];
     $lng=$record['lng'];
     $type=$record['type'];
     $rating=$record['rating'];
     $time_stamp=time()-1;
     
     $str.=$name."~".$address."~".$lat."~".$lng."~".$type."~".$time_stamp."~".$rating.";";
   
  }
 echo "$str";

}
}


?>

