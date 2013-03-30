<?php
/*
 * Created on Mar 9, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * test
 */



function switchLanguage(){
	$language="en";
    $uri="/chccc/cn/test.php";
	$target=$language;
	echo $target;
	if($language=="en"){
		$target="cn";
	}
	$pattern="/\/".$language."\//";
	$replacement="/".$target."/";
	print "pattern is ".$pattern;
	print "replacement is ".$replacement;
	print "uri is: ".$uri;
	
	$targetUri=preg_replace($pattern,$replacement,$uri);
	print "target uri is: ".$targetUri;
}

switchLanguage();
?>
