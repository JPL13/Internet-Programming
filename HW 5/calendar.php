#!/usr/local/bin/php
<?php print'<?xml version = "1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Calendar</title> 

<link rel="stylesheet" type="text/css" href="calendar.css" />

</head>

<body>


<div class="container">

<?php

date_default_timezone_set('America/Los_Angeles'); 
$hours_to_show=12;

$ts = time();

$ampm = date("a",$ts);
$hour = date("h",$ts);
$minute = date("i", $ts);
$dayofweek=date("D", $ts);
$month=date("F", $ts);
$dayofMonth=date("j", $ts);
$year=date("Y", $ts);
echo "<h1>Piao Family Schedule for $dayofweek, $month $dayofMonth, $year, $hour:$minute $ampm </h1>";

echo "<table id='event_table'>";

	echo "<tr>"; 
	echo "<th class='hr_td_'> &nbsp; </th>"; 
	echo "<th class='table_header'>Mom</th>"; 
	echo "<th class='table_header'>Dad</th>"; 
	echo "<th class='table_header'>Joe</th>"; 
	echo "</tr>";

for($i=0; $i<=$hours_to_show; $i++)
{
     
    $hour_display=get_hour_string($ts);
       
    if($i%2==0){
   echo "<tr class='even_row'> ";
   echo "<td class='hr_td'>$hour_display</td>"; echo "<td> </td>"; echo" <td> </td>"; echo "<td></td>";
   echo  "</tr>";
   }
   
   else {
   
   echo "<tr class='odd_row'> ";
   echo "<td class='hr_td'>$hour_display</td>"; echo "<td> </td>"; echo" <td> </td>"; echo "<td></td>";
   echo  "</tr>";
   }
   
   $ts = strtotime('+1 hour', $ts);
}

echo "</table>";


function get_hour_string($timestamp){ 
   $hour_string="";
     $ampm = date("a",$timestamp);
     $hour = date("g",$timestamp);
    $hour_string=$hour.".00".$ampm;

return $hour_string;
}

?>

</div>

</body>
</html>

