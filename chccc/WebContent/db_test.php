<html>
<head>
<title>test123</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
$username="chccc";
$password="53chccc2004";
$database="chccc";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query ('SET NAMES utf8');
$query="SELECT * FROM message";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "<b><center>Database Output</center></b><br><br>";
$i=0;
while ($i < $num) {

	$speaker=mysql_result($result,$i,"speaker");
	$message_title=mysql_result($result,$i,"message_title");
	
	
	echo "<b>$speaker</b><br>Message: $message_title<br>";
	
	$i++;
}
?>
</body>
</html>
