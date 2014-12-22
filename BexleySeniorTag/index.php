<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK REL=StyleSheet HREF="style.css" TYPE="text/css" MEDIA=screen>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<title>BST - Bexely Senior Tag 2012</title>

</head>

<body>

<div id="page_wrap">
	<div id="header">
    	<!--<a href="http://www.facebook.com/groups/169125146541583/" target="_blank"><img src="images/facebook.jpg" /></a>
    
        <div class="clear"></div>-->
    </div>
    
<?php 
 // Connects to your Database 
 mysql_connect("localhost", "root", "root") or die(mysql_error()); 
 mysql_select_db("senior_tag") or die(mysql_error()); 


?> 

	<div id="left">
    <img src="images/recentkills_top.png" />
    	<?php 
 // Connects to your Database 
 
 $data = mysql_query("SELECT *,DATE_FORMAT(deathdate, '%M %e, %Y, %l:%i%p') as newdate FROM player ORDER BY deathdate DESC") 
 or die(mysql_error()); 
 echo '<div id="test" style="width: 174px; height: 600px; overflow-y: auto; overflow-x:hidden;">';
 echo '<table class="table2">'; 
 


 while($info = mysql_fetch_array( $data )) 
 {
 if ($info['deathdate']){ 
 Print "<tr><td>"; 
 Print "<b>".$info['deathname'] . "</b> killed <b>".$info['name']."</b> at ".$info['newdate']." ".$info['location']; 
 echo "</td></tr>";
 
 }

 } 

 echo "</table>";
 echo "<img src='images/table_bottom.jpg' width='174px' />";
  echo "</div>";
 ?> 
  
    
    
 </div>
    
    
    
   	<div id="middle">
    <!--
    	<a href="index.php?sort=asc&category=kills"> Assending Kills</a><a href="index.php?sort=desc&category=kills"> Decending Kills</a>
     <br /> -->
     <img src="images/standings_top.png" />
 <?php
  
 $category = name; //Default 
 if ( isset ( $_GET [ 'category' ] ) )
{
   if ( $_GET [ 'category' ] == 'kills' )
   {
      $category = 'kills';
   }

   else if ( $_GET [ 'category' ] == 'teamname' )
   {
      $category = 'teamname';
   }
   
   else if ( $_GET [ 'category' ] == 'kills' )
   {
      $category = 'kills';
   }
   else if ( $_GET [ 'category' ] == 'deathname' )
   {
      $category = 'deathname';
   }
   else if ( $_GET [ 'category' ] == 'newdate' )
   {
      $category = 'deathdate';
   }
}   

 
 $sort = ''; // Default order ascending (auto)
if ( isset ( $_GET [ 'sort' ] ) )
{
   if ( $_GET [ 'sort' ] == 'desc' )
   {
      $sort = 'DESC';
   }
}


 
 $data = mysql_query("SELECT *,DATE_FORMAT(deathdate, '%M %e, %Y, %l:%i%p') as newdate FROM player ORDER BY ".$category." ". $sort ) 
 or die(mysql_error()); 
  echo '<div id="test" style="width: 600px; height: 650px; overflow-y: auto; overflow-x:hidden;">';
echo '<table class="table1">';
 Print "<tr><th>Name<a href='index.php?sort=asc&category=name'><img src='images/uparrow.png' width='10px'/></a>/<a href='index.php?sort=desc&category=name'><img src='images/downarrow.png' width='10px'/></a></th>";
 Print "<th>Team <a href='index.php?sort=asc&category=teamname'><img src='images/uparrow.png' width='10px'/></a>/<a href='index.php?sort=desc&category=teamname'><img src='images/downarrow.png' width='10px'/></a></th>";
 Print "<th>K/D<a href='index.php?sort=desc&category=kills'><img src='images/uparrow.png' width='10px'/></a>/<a href='index.php?sort=asc&category=kills'><img src='images/downarrow.png' width='10px'/></a></th>";
 Print "<th>Death By<a href='index.php?sort=asc&category=deathname'><img src='images/uparrow.png' width='10px'/></a>/<a href='index.php?sort=desc&category=deathname'><img src='images/downarrow.png' width='10px'/></a></th>";
 Print "<th>Death Date<a href='index.php?sort=asc&category=newdate'><img src='images/uparrow.png' width='10px'/></a>/<a href='index.php?sort=desc&category=newdate'><img src='images/downarrow.png' width='10px'/></a></th></tr>";
 while($info = mysql_fetch_array( $data )) 
 { 
 Print "<tr>"; 
 Print "<td width=120px>".$info['name'] . "</td> ";
 Print "<td width=120px>".$info['teamname'] . "</td> "; 
 Print "<td width=60px	>".$info['kills'] . "</td> ";
 Print "<td width=120px>".$info['deathname'] . "</td> ";
 Print "<td width=180px>".$info['newdate'] . " </td></tr>"; 
 } 
 Print "</table>"; 
  
 ?> 
    <img src="images/table_bottom.jpg" /></div>
    
    </div>
    
    
    
    
    <div id="right">
    <img src="images/leaderboard.png" />
     <?php
// Make a MySQL Connection //Team Leader Board
//$query = "SELECT (SELECT SUM(kills) FROM player) - (SELECT SUM(death) FROM player) as total, teamname FROM player GROUP BY teamname";//

$query = "SELECT *, SUM(kills) FROM player GROUP BY teamname ORDER BY SUM(kills) DESC;";

	 
$result = mysql_query($query) or die(mysql_error());

// Print out result
echo '<table class="table3">';
while($row = mysql_fetch_array($result)){
	echo "<tr>";	
	echo "<td>".$row['teamname']."</td><td> ". $row['SUM(kills)']."</td>";
	echo "</tr>";
}
echo "</table>"; 
?>

<img src="images/table_bottom.jpg" width="174px" />
    
    
    </div>


   <div class="clear"></div>
<div id="footer">
	<center><p>Created by Alec Robins Class of 2012</p>
    <a href="mailto:alecrobins@gmail.com" target="_blank"><p>Contact for Web Design</p></a> </center>
 </div>
   
</div>   
</body>
</html>
