<?php
if ($handle = opendir("$_SERVER[DOCUMENT_ROOT]/images/roller/")) {
    echo "<div id='makeMeScrollable'>";
    

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
    	if("."==$entry || ".."==$entry)continue;
        echo "<img src='/images/roller/$entry' />";
    }

	echo "</div>";
    closedir($handle);
}
?>

