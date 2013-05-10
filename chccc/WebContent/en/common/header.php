<?php 
function switchLanguage($target){	
	$uri=$_SERVER["REQUEST_URI"];
	$language="en";
	if(preg_match("/\/zh\//",$uri)){
		$language="zh";
	}
	
	if($target!=$language){
	
		$pattern="/\/".$language."\//";
		$replacement="/".$target."/";
		
		$targetUri=preg_replace("/\/".$language."\//","/".$target."/",$uri);
		print $targetUri;
	}else print $uri;
 
}
?>
   <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Cherry Hill Chinese Christian Church</a></h1>
          <h2>Together We Serve</h2>
        </div>
      </div>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="/en/index.php">Home</a></li>
            <li><a href="#">About Us</a>
               <ul>
                <li><a href="/en/aboutus/statement.php">Statement</a></li>
                 <li><a href="/en/aboutus/vision.php">History</a></li>
                <li><a href="/en/aboutus/history.php">History</a></li>
                <li><a href="/en/aboutus/direction.php">Direction</a></li>
                <li><a href="/en/aboutus/contactus.php">Contact Us</a></li>
              </ul>	
            </li>
            <li><a href="page.html">Worship</a>
              <ul>
                <li><a href="#">Children Worship</a></li>
                <li><a href="#">Music</a></li>
                <li><a href="#">Online Sermons</a></li>
                <li><a href="#">Schedule</a></li>
              </ul>	
            </li>
            <li><a href="another_page.html">Learning</a>
              <ul>
                <li><a href="#">Children Sunday School</a></li>
                <li><a href="#">Adult Sunday School</a></li>
              </ul>	
            </li>
            <li><a href="#">Our Community</a>
              <ul>
                <li><a href="#">Neighborhood</a></li>
                <li><a href="#">Children Ministry</a></li>
                <li><a href="#">Youth Ministry</a></li>
                <li><a href="#">English</a></li>
                <li><a href="#">Mandarin</a></li>
              </ul>
            </li>
            <li><a href="events.php">Events</a></li>
            <li><a href="<?php switchLanguage('zh');?>">中文</a></li>
          </ul>
        </div>
      </nav>
    </header>
 
