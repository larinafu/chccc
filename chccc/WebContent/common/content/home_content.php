<?php require_once "$_SERVER[DOCUMENT_ROOT]/common/LanguageUtil.php" ?>
<?php
	$language = LanguageUtil::getCurrentLanguage();
	$title_news="教會消息 <a style='font-size:90%'  href='sunday_stream.php'> → (崇拜网络直播 📺)</a>";
	$title_message="崇拜  <a style='font-size:80%'  href='sunday_stream.php'>(网络直播 📺)</a> ";
	$title_songs="主日詩班獻詩";
	if("en"== $language){
		$title_news="News";
		$title_message="Sunday Message   <a style='font-size:80%'  href='sunday_stream.php'>(网络直播 📺)</a> ";
		$title_songs="Songs";
	}
?>
<div class="content">
            <div>
		  <img src="../../images/logos/2019Anniversary.JPG" width="932" height="308">
	   </div>
       <div class="home_news_summary">
          <h3><?php echo($title_news); ?></h3>
		  <?php include "$_SERVER[DOCUMENT_ROOT]/common/content/news_summary.php"; ?>
        </div>
        <div class="latest_message">
          <h3><?php echo ($title_message);?></h3>
		  <?php include "$_SERVER[DOCUMENT_ROOT]/common/content/latest_message.php"; ?>		  
        </div>
     <div class="latest_message">
          <h3><?php echo ($title_songs);?></h3>
		  <?php include "$_SERVER[DOCUMENT_ROOT]/common/content/latest_hymn.php"; ?>
        </div>
</div>
