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
          <h1><a href="/index.php">櫻桃山華人基督教會</a></h1>
          <h2>Together We Serve</h2>
        </div>
      </div>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="/zh/index.php">主頁</a></li>
            <li><a href="/zh/aboutus/statement.php">簡介</a>
               <ul>
                <li><a href="/zh/aboutus/statement.php">教會信仰</a></li>
                <li><a href="/zh/aboutus/history.php">教會歷史</a></li>
                <li><a href="/zh/aboutus/map.php">地圖</a></li>
                <li><a href="/zh/aboutus/contactus.php">聯絡我們</a></li>
              </ul>	
            </li>
            <li><a href="/zh/worship/children_worship.php">崇拜</a>
              <ul>
                <li><a href="/zh/worship/children_worship.php">兒童崇拜</a></li>
                <li><a href="/zh/worship/hymns.php">詩歌</a></li>
                <li><a href="/zh/worship/messages.php">網絡信息</a></li>
                <li><a href="/zh/worship/worship_time.php">崇拜時間</a></li>
              </ul>	
            </li>
            <li><a href="/zh/sundayschool/children_sunday_school.php">進修</a>
              <ul>
                <li><a href="/zh/sundayschool/children_sunday_school.php">兒童主日學</a></li>
                <li><a href="/zh/sundayschool/adult_sunday_school.php">成人主日學</a></li>
              </ul>	
            </li>
            <li><a href="/zh/community/community_ministry.php">我們的社區</a>
              <ul>
                <li><a href="/zh/community/community_ministry.php">社區事工</a></li>
                <li><a href="/zh/community/children_ministry.php">兒童事工</a></li>
                <li><a href="/zh/community/youth_ministry.php">青少年事工</a></li>
                <li><a href="/zh/community/english_ministry.php">英文堂</a></li>
                <li><a href="/zh/community/mandarin_ministry.php">國語堂</a></li>
              </ul>
            </li>
            <li><a href="/events.php">最新活動</a></li>
            <li><a href="<?php switchLanguage('en'); ?>">English</a></li>
          </ul>
        </div>
      </nav>
    </header>