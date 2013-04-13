<?php
$username="chccc";
$password="53chccc2004";
$database="chccc";

mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query ('SET NAMES utf8');
$query="SELECT * FROM ch_news where published=1 order by news_date desc,sort_order";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

$i=0;

while ($i < $num) {

	$news_date=mysql_result($result,$i,"news_date");
	$news_summary=mysql_result($result,$i,"news_summary");
	
	
	echo "<li>$news_summary</li>";
	
	$i++;
}

?>