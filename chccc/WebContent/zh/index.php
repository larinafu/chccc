<!DOCTYPE HTML>
<html>

<head>
  <?php include '../common/head.php'; ?> 
  <link rel="Stylesheet" type="text/css" href="/css/smoothDivScroll.css" /> 
</head>

<body>
  <div id="main">
	<?php include './common/header.php'; ?>		

    <div id="site_content">
               <!-- image scrollable -->    
    	<div id="makeMeScrollable">
			<img src="/images/DSC_0301.jpg" alt="Field" id="field" />
			<img src="/images/DSC_0305.jpg" alt="Pencils" id="pencils" />
			<img src="/images/DSC_0307.jpg" alt="Golf" id="golf" />
			<img src="/images/DSC_0309.jpg" alt="Golf" id="golf" />
			<img src="/images/DSC_0313.jpg" alt="Golf" id="golf" />
			<img src="/images/DSC_0314.jpg" alt="River" id="river" />
			<img src="/images/DSC_0315.jpg" alt="Train" id="train" />
			<img src="/images/DSC_0293.jpg" alt="Gnome" id="gnome" />
			<img src="/images/DSC_0318.jpg" alt="Leaf" id="leaf" />
			<img src="/images/DSC_0325.jpg" alt="Leaf" id="leaf" />
		</div>      
  		<?php include './content/home_sidebar.php'; ?> 
      	<?php include './content/home_content.php'; ?>
      	
 
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
				autoScrollingMode: "onStart"
			});
    });
  </script>
</body>
</html>

