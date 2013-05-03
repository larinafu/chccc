<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?>
<div class="subcontent">
<li>網絡信息</li>
<?php
mysql_connect($db_host, $username, $password);
@ mysql_select_db($database) or die("Unable to select database");
mysql_query('SET NAMES utf8');
$query = "SELECT DISTINCT YEAR(MESSAGE_DATE) AS message_year FROM ch_message ORDER BY YEAR(MESSAGE_DATE) DESC";
$result = mysql_query($query);

//we are using isset() to avoid the "Notice: Undefined Index" from php 

$num = mysql_numrows($result);
$selected_year=null;
if(isset($_GET['message_year']))$selected_year=$_GET['message_year']; 

$i = 0;
echo "<table><tr>";
while ($i < $num) {

	$year = mysql_result($result, $i, "message_year");
	if(!isset($selected_year))$selected_year=$year;
	if(isset($_SERVER['REQUEST_URL'])){
		$current_url=$_SERVER['REQUEST_URL'];
	}
	else{
		$current_uri=$_SERVER['REQUEST_URI'];
		$pos=strpos($current_uri,"?");
		$current_url=$_SERVER['REQUEST_URI'];
		if($pos!=false){
			$current_url=substr($current_uri,0,$pos);
		}		
	}
	echo "<td><a href='$current_url?message_year=$year'>$year</a></td>";

	$i++;
}
echo "</tr></table>";

//MESSAGES
$query = "SELECT * FROM ch_message WHERE YEAR(message_date)=$selected_year ORDER BY message_date DESC";
$result = mysql_query($query);

$num = mysql_numrows($result);

$i = 0;

echo "<table style='border-bottom:1px solid #888'><tr><th>日期</th><th>講員</th><th>主題</th><th>大綱</th></tr>";
while ($i < $num) {
	$background=null;
	if($i%2==0)$background="rgb(245, 245, 250)";
	$speaker = mysql_result($result, $i, "speaker");
	$message_title = mysql_result($result, $i, "message_title");
	$message_date = mysql_result($result, $i, "message_date");

	echo "<tr";
	if(isset($background))echo " style='background-color:$background'";
	echo "><td>$message_date</td><td>$speaker</td>" .
			"<td><a href='/library/$message_date.mp3'>$message_title</a></td>" .
			"<td><a href='/library/pdf/$message_date.pdf'><img src='/images/pdf.gif'></a></td></tr>";

	$i++;
}

mysql_close();
echo "</table>";
?>
</div>


