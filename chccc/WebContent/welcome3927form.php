<?php

//include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ;
//require "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ;


// This may called from mobile webkit and jump to another page,
// use mobile friendly html for output.
function handleWelcomeForm(){
    include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php";
    // echo json_encode($_POST["newGuests"]);
    // The basic idea is to copy the .pptx (zipped xml files, has fixed number of slide pages) template
    // to the new location with a random name, replace the existing string with
    // the passed guest name for each slide xml file. At last change name to
    // predefined pptx name for download.
    // admin page should check  it peridically to update UI for downloading.
    $welcomeFileName = $_POST["welcomeFileName"];
    
    $pptxTemplate= "admin/welcomeTemplate.pptx" ;// in the admin dir as this file.
    $tmpZip = tempnam($_SERVER["DOCUMENT_ROOT"] . $pdf_library , "wel");
    $newNamePptx = $_SERVER["DOCUMENT_ROOT"] . $pdf_library . $welcomeFileName ;
    
    
    if( !copy($pptxTemplate, $tmpZip) ){
	echo "Can not copy file:" . $pptxTemplate . " to:" . $tmpZip ;
	return;
    }
    // slides are single xml files named by  "ppt/slides/slide{pageNumber}.xml
    // slide1.xml will always be empty as the title page.
    // start from slide2.xml; "......"
    $predefinedPages = 20 ; // only support 20 slides.
    $needReplaced = "......" ; // we use that to hold the place in each page.
    //clean guests list.
    $guests=array();
    foreach($_POST["newGuests"] as $guestInput){
	$kk = trim($guestInput);
	if (strlen($kk) > 0 ){
	    array_push($guests, $kk);
	}
    }
    if(sizeof($guests) == 0 ){
	echo "no guests input, NOT write to file!";
	unlink($tmpZip);
	return ;
    }
    echo '<html><head><meta http-equiv="content-type" content="text/html; charset=UTF-8" ><meta name="viewport" content="width=device-width, initial-scale=1" ><style type="text/css"> button {font-size: 24px;}</style></head><body><h2>Guest file generation</h2> ';
    echo "<p> process guests ...</p>";
    
    $zip = new ZipArchive;
    if ( $zip -> open($tmpZip) === TRUE ){
	$i = 2 ;
	foreach($guests as $guestName ){
	    $zipEntryName= "ppt/slides/slide" . $i . ".xml" ;
	    $oldXml = $zip -> getFromName($zipEntryName);
	    if($oldXml){
		$newXml = str_replace($needReplaced, $guestName, $oldXml);
		$zip->deleteName($zipEntryName);
		$zip->addFromString($zipEntryName, $newXml);
		echo "<p> ". $zipEntryName . " => " . $guestName . "</p>";
	    }
	    
	    $i ++ ;
	}
	$zip -> close();
	rename($tmpZip, $newNamePptx);
    }
    echo "Zip to: " . $welcomeFileName ;
    echo "<p>处理完毕，服务器迎新ppt文件已写好。 Done output file! </p>";
    echo "<p>请点击按钮返回迎新名单输入界面。</p>";
    echo "<button onclick='window.history.back()' >返回 back</back>";
    echo "</body></html>";
}
function handleCheckWelcomeFile(){
     include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php";
   // echo "fn:" . $_POST["welcomeFileName"] . " is what?" ;
    $newPptx = $_SERVER["DOCUMENT_ROOT"] . $pdf_library .  $_POST["welcomeFileName"];
    // check the existance of file and return creation time for refresh.
    
    if ( file_exists($newPptx ) ){
	echo json_encode(array('mtime' => filemtime($newPptx) , 'href' => $pdf_library .  $_POST["welcomeFileName"]) );
    }else{
	echo json_encode(array('fileExists' => FALSE, 'fileName' => $_POST["welcomeFileName"] ));
    }
}

// Only handle insert record of 诗歌


switch($_POST["formType"]){
    case "messagePdfForm":
	handleMessagePdfForm();
	break;
    case "welcomeForm":
	handleWelcomeForm();
	break;
    case "checkWelcomeFile":
	handleCheckWelcomeFile();
	break;
    case "hymnForm":
	handleHymnForm();
	break;
    case "messageAudioForm":
	handleAudioMessageForm();
    break;
case "deleteTodayForm":
    handleDeleteTodayForm();//may only check info.
    break;
    
    default:
	echo "Don't call it directly, use it as ajax form handler.";
	
};


?>
 
