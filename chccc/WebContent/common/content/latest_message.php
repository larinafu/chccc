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
        $field_speaker_title="speaker_title";
        $field_message_title="message_title";
        if("en"==$language){        
                $query="select * from ch_message_en order by message_date desc";
        }
        
        $result=mysql_query($query);
        
        $num=mysql_numrows($result);
        
        mysql_close();
        
        
        $i=0;
                  
        while ($i < min(3,$num)) {
        
                $speaker=mysql_result($result,$i,$field_speaker);
                $speaker_title=mysql_result($result,$i,$field_speaker_title);
                $message_title=mysql_result($result,$i,$field_message_title);
                $message_date=mysql_result($result,$i,"message_date");
                $message_audio_file =mysql_result($result, $i, "message_audio_file_name");
                $message_pdf_file =mysql_result($result, $i, "message_pdf_file_name");
                
                if(!isset($message_audio_file)||""==$message_audio_file){
                        $date_msg=new DateTime($message_date);        
                        //echo "date is ".$date_msg;                
                        $message_audio_file=date_format($date_msg, 'mdY').".mp3";
                        //echo "audio file is ".$message_audio_file;
                }
                
                if(!isset($message_pdf_file)){
                        $message_pdf_file=$message_date."pdf";
                }
                
                $pdf_exists=false;
                
                if(!empty($message_pdf_file)&&file_exists("$_SERVER[DOCUMENT_ROOT]$pdf_library$message_pdf_file")){
                        $pdf_exists=true;                        
                }
                
                if("en"==$language)
                {
                        echo "<tr><td>$message_date</td>" .
                                        "<td>$speaker_title $speaker</td><td><a href='$audio_library$message_audio_file'>$message_title</a></td><td>";        
                }
                else
                {
                                echo "<tr><td>$message_date</td>" .
                                        "<td>$speaker$speaker_title</td><td><a href='$audio_library$message_audio_file'>$message_title</a></td><td>";        
                }
                if($pdf_exists){
                                echo "<a href='$pdf_library$message_pdf_file'><img src='/images/pdf.gif'></a>";
                }
                echo "</td></tr>";
        
                $i++;
        }
                
?>
</table>
