<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
</head>
<body>
<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?>
<?php

mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query ('SET NAMES utf8');

$query="SELECT * FROM ch_news";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "<b><center>Database Output</center></b><br><br>";
$i=0;
while ($i < $num) {
	$news_id = mysql_result($result,$i,"news_id");
	$news_date = mysql_result($result,$i,"news_date");
	$news_summary = mysql_result($result,$i,"news_summary");
	$news = mysql_result($result,$i,"news");
	$news_summary_en = mysql_result($result,$i,"news_summary_en");
	$news_en = mysql_result($result,$i,"news_en");
	$sort_order = mysql_result($result,$i,"sort_order");
		
	
	echo "<b>$speaker</b><br>News: $news_summary<br>";
	echo "<a href='NewsEdit.php?id=$news_id'>Edit</a><p>";
	$i++;
}
?>
<p>
<a href="NewsEdit.php">Create News</a>
</body>
</html>
