<table>
<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?>
<?php


mysql_connect($db_host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query ('SET NAMES utf8');
$query="SELECT * FROM ch_music";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

$i=0;
          
while ($i < min(2,$num)) {

	$music_name=mysql_result($result,$i,"music_name");
	$music_date=mysql_result($result,$i,"music_date");
	
	echo "<tr><td>$music_date</td>" .
			"<td><a href='/library/m$music_date.mp3'>$music_name</a></td>" ;
	
	$i++;
}
		
?>
</table>


