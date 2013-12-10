<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?> 
<html>
	<head>
	<title>Message Edit</title>
	  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	   	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	    <script type="text/javascript">
	        $(function() {
			    $("#messageDate" ).datepicker({ dateFormat: "yy-mm-dd" });
			    $("#messageDate" ).datepicker();

			    $("form :text").width(800);
			    $("#messageDate" ).width(100);
			    $('input[name^="messageSpeaker"]').width(100);
			    
			  });
	    </script>
	    <style type="text/css">
	        div.header {
	            font-weight: bolder;
	            font-size: 20pt;
	        }
	        td.label {
	            font-size: 13pt;
	            text-align:right;
	            width: 20%;
	        }
	        td.space {
	        	width:5%;
	        }
	    </style>
	</head>
	<body>
	<?php include $_SERVER[DOCUMENT_ROOT]. '/admin/header_en.php'; ?>	
	<div align="center">
<?php
$message_id = $_GET['id'];

$message_date = "";
$message_speaker = "";
$message_title = "";
$message_audioFileName = "";
$message_pdfFileName = "";
$message_videoFileName = "";
$bible_verse = "";
if (array_key_exists('save', $_POST)) {
	//Post back
	$message_date = $_POST["messageDate"];
	$message_speaker = $_POST["messageSpeaker"];
	$message_title = $_POST["messageTitle"];
	$message_audioFileName = $_POST["messageAudioFileName"];
	$message_id = $_POST["messageID"];
	$message_pdfFileName = $_POST["messagePdfFileName"];
	$message_videoFileName = $_POST["messageVideoFileName"];
	$bible_verse = $_POST["bibleVerse"];
	$db = new PDO('mysql:host='.$db_host.';dbname='.$database,
    $username,
    $password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


	if (empty($message_id))	{
		/*echo "INSERT INTO ch_message_en " .
				"	(message_date, speaker, message_title, message_audio_File_Name) " .
				"	VALUES " .
				"	('$message_date', '$message_speaker', '$message_title', '$message_audioFileName')";
				
		echo "<br>";
		*/
		
		$db->query("INSERT INTO ch_message_en " .
				"	(message_date, speaker, message_title, message_audio_File_Name, message_pdf_file_name, message_video_file_name, bible_verses) " .
				"	VALUES " .
				"	('$message_date', '$message_speaker', '$message_title', '$message_audioFileName', '$message_pdfFileName', '$message_videoFileName', " .
				"	'$bible_verse')");			
		echo "Added sucessfully";
	}
	else {
		$db->query("UPDATE ch_message_en SET " .
				"	message_date = '$message_date', " .
				"	speaker = '$message_speaker', " .
				"	message_title='$message_title', " .
				"	message_audio_file_name = '$message_audioFileName', " .
				"	message_pdf_file_name = '$message_pdfFileName', " .
				"	message_video_file_name = '$message_videoFileName', " .
				"	bible_verses = '$bible_verse', " .
				" WHERE message_id = $message_id");
		echo "Updated sucessfully";
	}
	
	//echo "Click <a href='MessageList_en.php'>here</a> to go back";
	//header("Location: MessageList_en.php");
	exit();
	
}

else {


	if (!is_null($message_id)) {
		
		mysql_connect($db_host,$username,$password);
		@mysql_select_db($database) or die( "Unable to select database");
		mysql_query ('SET NAMES utf8');
		
		$query="SELECT * FROM ch_message_en WHERE message_id = $message_id";
		$result=mysql_query($query);
		
		$num=mysql_numrows($result);
		
		mysql_close();
		$message_date = mysql_result($result, 0, "message_date");
		$message_speaker = mysql_result($result, 0, "speaker");
		$message_title = mysql_result($result, 0, "message_title");
		$message_audioFileName = mysql_result($result, 0, "message_audio_file_name");
		$message_pdfFileName = mysql_result($result, 0, "message_pdf_file_name");
		$message_videoFileName = mysql_result($result, 0, "message_video_file_name");
		$bible_verse = mysql_result($result, 0, "bible_verses");
	}
		
	?>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<table border="0" cellpadding="0" cellspacing="0" width="80%" align="center">
			<tr>
				<td class="label"></td>
				<td class="space"></td>
				<td><div class="header"><?php echo is_null($message_id) ? "Add " : "Update "; ?>Message</div><br></td>
			</tr>
			<tr>
				<td class="label">Date:</td>
				<td class="space"></td>
				<td><input type="text" name="messageDate" id="messageDate" value="<?php echo $message_date ?>" /></td>
			</tr>
			<tr>
				<td class="label">Speaker Name:</td>
				<td class="space"></td>
				<td><input type="text" name="messageSpeaker" id="messageSpeaker" value="<?php echo $message_speaker ?>" /></td>
			</tr>
			<tr>
				<td class="label">Message Title:</td>
				<td class="space"></td>
				<td><input type="text" name="messageTitle" id="messageTitle"value="<?php echo $message_title ?>" /></td>
			</tr>
			<tr>
				<td class="label">Audio File:</td>
				<td class="space"></td>
				<td><input type="text" name="messageAudioFileName" id="messageAudioFileName" value="<?php echo $message_audioFileName ?>" /></td>
			</tr>
			<tr>
				<td class="label">PDF file</td>
				<td class="space"></td>
				<td><input type="text" name="messagePdfFileName" id="messagePdfFileName" value="<?php echo $message_pdfFileName ?>" /></td>
			</tr>
			<tr>
				<td class="label">Video File:</td>
				<td class="space"></td>
				<td><input type="text" name="messageVideoFileName" id="messageVideoFileName" value="<?php echo $message_videoFileName ?>" /></td>
			</tr>
			<tr>
				<td class="label">Bible Verses:</td>
				<td class="space"></td>
				<td>
				<textarea name="bibleVerse" id="bibleVerse" rows="4" cols="100"><?php echo $bible_verse ?></textarea>
				</td>
			</tr>
			<tr>
				<td class="label"></td>
				<td class="space"></td>
				<td>
					<input type="submit" name="save" value="<?php echo is_null($message_id) ? 'Add' : 'Update'; ?>" />&nbsp;
					<input type="button" name="cancel" value="Cancel" onclick="javascript:history.back(1);" />
				</td>
			</tr>
		</table>
		<input type="hidden" name="messageID" value="<?php echo is_null($message_id) ? '' : $message_id; ?>" />
		
	</form>
	
<?php } ?>
</div>
</body>
</html>