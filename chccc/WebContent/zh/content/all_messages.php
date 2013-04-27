
<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?>
<?php
mysql_connect($db_host, $username, $password);
@ mysql_select_db($database) or die("Unable to select database");
mysql_query('SET NAMES utf8');
$query = "SELECT DISTINCT YEAR(MESSAGE_DATE) AS message_year FROM ch_message ORDER BY YEAR(MESSAGE_DATE) DESC";
$result = mysql_query($query);

$num = mysql_numrows($result);
$selected_year=$_GET['message_year'];

$i = 0;
echo "<table><tr>";
while ($i < $num) {

	$year = mysql_result($result, $i, "message_year");
	if(!isset($selected_year))$selected_year=$year;
	$current_url=$_SERVER['REQUEST_URL'];
	echo "<td><a href='$current_url?message_year=$year'>$year</a></td>";

	$i++;
}
echo "</tr></table>";

//MESSAGES
$query = "SELECT * FROM ch_message WHERE YEAR(message_date)=$selected_year ORDER BY message_date DESC";
$result = mysql_query($query);

$num = mysql_numrows($result);

$i = 0;

echo "<table>";
while ($i < $num) {

	$speaker = mysql_result($result, $i, "speaker");
	$message_title = mysql_result($result, $i, "message_title");
	$message_date = mysql_result($result, $i, "message_date");

	echo "<tr><td>$message_date</td><td>$speaker</td><td><a href='/library/$message_date.mp3'>$message_title</a></td><td></td></tr>";

	$i++;
}

mysql_close();
echo "</table>";
?>



