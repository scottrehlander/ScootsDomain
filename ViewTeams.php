<?php 
	session_start(); 
	$userName = $_SESSION['userName'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
	
	$con = mysql_connect("localhost", "admin", "");
	if(!$con)
	{
		 die(mysql_error());
	}
	mysql_select_db("fantasydb", $con);	
	
	$sql = "SELECT * FROM competitors";
	$sqlResult = mysql_query($sql, $con) or die("Unexpected Database Error");
	
	echo("<table width=80% cellspacing=0 cellpadding=0 border=1><tr bgcolor=\"black\" style=\"color:#FFFFFF\"><td>Member</td><td>Points</td></tr>");

	while($members = mysql_fetch_array( $sqlResult )
	{
		echo("<tr><td>" . $members["Competitor Name"] . "</td><td>" . $members["ScoreYTD"] . "</td></tr>");
	}
	
	echo("</table>");
	
?>


</body>
</html>
