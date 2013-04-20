<table>
<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?>
<?php


mysql_connect($db_host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query ('SET NAMES utf8');
$query="SELECT * FROM ch_message";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

$i=0;
          
while ($i < $num) {

	$speaker=mysql_result($result,$i,"speaker");
	$message_title=mysql_result($result,$i,"message_title");
	$message_date=mysql_result($result,$i,"message_date");
	
	echo "<tr><td>$message_date</td><td>$speaker</td><td><a href='/library/$message_date.mp3'>$message_title</a></td><td></td></tr>";
	
	$i++;
}
		
?>
</table>

