<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php include $_SERVER[DOCUMENT_ROOT]. '/common/db_conn.php'; ?>		
<?php

mysql_connect($db_host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query ('SET NAMES utf8');

$query="SELECT * FROM ch_group order by sort_order";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "<table width='60%' border='1'><tr><td colspan='4'>团契</td></tr>";
$i=0;
while ($i < $num) {
	$group_id  =mysql_result($result,$i,"group_id");
	$group_name =mysql_result($result,$i,"group_name"); 
	$group_description =mysql_result($result, $i, "group_description");
	$sort_order  =mysql_result($result, $i, "sort_order");
?>
	<tr>
		<td><?php echo $group_name ?></td>
		
		<td><a href='GroupEdit.php?id=<?php echo $group_id ?>'>编辑</a></td>
		<td><a href='GroupPhotoList.php?id=<?php echo $group_id ?>'>管理相片</a></td>
	</tr>
<?php	
	$i++;
}	

echo "</table>";
?>
<p>
<a href="GroupEdit.php">创建新团契</a>
</body>
</html>
