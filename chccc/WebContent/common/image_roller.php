<?php
include('SimpleImage.php');

if ($handle = opendir("$_SERVER[DOCUMENT_ROOT]/images/roller/")) {
    echo "<div id='makeMeScrollable'>";
    

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
    	if("."==$entry || ".."==$entry)continue;
        echo "<img src='/images/roller/$entry' />";
        $image_info=getimagesize("$_SERVER[DOCUMENT_ROOT]/images/roller/$entry");
        if($image_info[1]>330){
        	$image = new SimpleImage();
        	$image->load("$_SERVER[DOCUMENT_ROOT]/images/roller/$entry");
        	$image->resizeToHeight(330);
  			$image->save("$_SERVER[DOCUMENT_ROOT]/images/roller/$entry");
        }
    }

	echo "</div>";
    closedir($handle);
    
}

function resize($filename){
	
}
?>

