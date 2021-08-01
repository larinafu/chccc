<!DOCTYPE HTML>
<html>

<head>
  <?php include '../common/head.php'; ?> 
  <link rel="Stylesheet" type="text/css" href="/css/smoothDivScroll.css" /> 
</head>

<body>
<?php include_once("../common/analyticstracking.php") ?>
  <div id="main"><?php include "./common/header.php"; ?>		

    <div id="site_content">
    	<!-- call image_roller -->		    

      

            <h3>中文堂主日崇拜直播</h3>
<ol><li>请参考上面菜单中"崇拜" -> "崇拜時間" 来观看直播。 直播在其他时间关闭。 </li>
     <li>如果没有开始播放，请点击直播窗口左下方播放按键 ▶️ 开始播放。</li>
     <li>点击窗口右下方全屏显示 ⛶ 按键 以获得最佳观看效果。</li>
     </ol>
<iframe src="https://player.twitch.tv/?channel=cherryhillccc&parent=cherryhillccc.org&parent=www.cherryhillccc.org" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="620" autoplay="true" muted="false" ></iframe><!-- <a href="https://www.twitch.tv/cherryhillccc?tt_content=text_link&tt_medium=live_embed" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px; text-decoration:underline;">Watch live video from cherryhillccc on www.twitch.tv</a> -->


     <?php
      $reports = glob("../weeklyreport3927/*.pdf");
if( count($reports) > 0 ){
    // sort by create.
    usort($reports, create_function('$a,$b', 'return filemtime($a) - filemtime($b);'));
    echo "<h3 style='margin-top:20px;'><a href='" . $reports[count($reports)-1]  . "'>主日周报</a></h3>" ;
}
     ?>
    </div>
    
 	<?php include './common/footer.php'; ?>
  </div>
  <p>&nbsp;</p>
   <!-- javascript at the bottom for fast page loading -->
  <!-- <script type="text/javascript" src="/js/jquery.js"></script> -->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
   	<script src="/js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
	
	<!-- Latest version of jQuery Mouse Wheel by Brandon Aaron
		 You will find it here: http://brandonaaron.net/code/mousewheel/demos -->
	<script src="/js/jquery.mousewheel.min.js" type="text/javascript"></script>

	<!-- jQuery Kinetic - for touch -->
	<script src="/js/jquery.kinetic.js" type="text/javascript"></script>

	<!-- Smooth Div Scroll 1.3 minified -->
	<script src="/js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="/js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
     $('ul.sf-menu').sooperfish();
      		$("#makeMeScrollable").smoothDivScroll({
				mousewheelScrolling: "allDirections",
				manualContinuousScrolling: true,
				autoScrollingMode: "onStart",
				autoScrollingInterval: 30
			});
    });
  </script>
  <script type="text/javascript" src="http://webplayer.yahooapis.com/player.js"></script>
</body>
</html>

