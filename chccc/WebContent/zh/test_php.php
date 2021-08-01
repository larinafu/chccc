<!DOCTYPE HTML>
<html>

<head>
  <?php include '../common/head.php'; ?> 
  <link rel="Stylesheet" type="text/css" href="/css/smoothDivScroll.css" /> 
</head>

<body>


<?php require_once "$_SERVER[DOCUMENT_ROOT]/common/LanguageUtil.php" ?>
<?php
	$language = LanguageUtil::getCurrentLanguage();
	$title_news="教會消息";
	$title_message="主日信息";
	$title_songs="主日詩班獻詩";
	if("en"== $language){
		$title_news="News";
		$title_message="Sunday Message";
		$title_songs="Songs";
	}
?>
<div class="content">
     <div class="latest_message">
          <h3><?php echo ($title_songs);?></h3>
		  <?php include "$_SERVER[DOCUMENT_ROOT]/common/content/list_all_hymns.php"; ?>
        </div>
</div>

<!--
  <script type="text/javascript" src="http://webplayer.yahooapis.com/player.js"></script>
-->
</body>
</html>