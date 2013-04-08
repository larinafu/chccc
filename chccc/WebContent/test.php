<?php
/*
 * Created on Mar 9, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * test
 */
 echo "server docu root: $_SERVER[DOCUMENT_ROOT]";
 
if ($handle = opendir("$_SERVER[DOCUMENT_ROOT]/images")) {
    echo "Directory handle: $handle\n";
    echo "Entries:\n";

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
        echo "$entry\n<br>";
    }

    /* This is the WRONG way to loop over the directory. 
    while ($entry = readdir($handle)) {
        echo "$entry\n";
    }
    */

    closedir($handle);
}

echo "do"



?>
