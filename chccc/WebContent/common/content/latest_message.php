<table>
<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?>
<?php require_once "$_SERVER[DOCUMENT_ROOT]/common/LanguageUtil.php" ?>
<?php
	$language = LanguageUtil::getCurrentLanguage();
	
	mysql_connect($db_host,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	mysql_query ('SET NAMES utf8');
	$query="SELECT * FROM ch_message order by message_date desc";
	$field_speaker="speaker";
	$field_message_title="message_title";
	if("en"==$language){	
		$query="select * from ch_message_en order by message_date desc";
	}
	
	$result=mysql_query($query);
	
	$num=mysql_numrows($result);
	
	mysql_close();
	
	
	$i=0;
	          
	while ($i < min(2,$num)) {
	
		$speaker=mysql_result($result,$i,$field_speaker);
		$message_title=mysql_result($result,$i,$field_message_title);
		$message_date=mysql_result($result,$i,"message_date");
		
		echo "<tr><td>$message_date</td>" .
				"<td>$speaker</td><td><a href='/library/$message_date.mp3'>$message_title</a></td>" .
				"<td><a href='/library/pdf/$message_date.pdf'><img src='/images/pdf.gif'></a></td></tr>";
	
		$i++;
	}
		
?>
</table>


