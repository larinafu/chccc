<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?>	
<?php

mysql_connect($db_host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query ('SET NAMES utf8');

$query="SELECT * FROM ch_message order by message_date desc";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "<table width='60%' border='1'><tr><td colspan='4'>������������</td></tr>";
$i=0;
while ($i < $num) {

	$speaker=mysql_result($result,$i,"speaker");
	$speaker_title =mysql_result($result,$i,"speaker_title");
	$message_title = mysql_result($result,$i,"message_title");
	$message_date = mysql_result($result,$i,"message_date");
	$message_audio_file_name = mysql_result($result,$i,"message_audio_file_name");
	$message_id = mysql_result($result,$i,"message_id");
?>
	<tr>
		<td><?php echo $speaker ?>&nbsp;&nbsp;&nbsp;<?php echo $speaker_title ?></td>
		<td><?php echo $message_title ?></td>
		<td><?php echo $message_date ?></td>
		<td><a href='MessageEdit.php?id=<?php echo $message_id ?>'>Edit</a></td>
	</tr>
<?php	
	$i++;
}

echo "</table>";
?>
<p>
<a href="MessageEdit.php">Create New Message</a>
</body>
</html>
