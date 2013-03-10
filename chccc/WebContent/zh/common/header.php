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
          <h1><a href="index.html">櫻桃山華人基督教會</a></h1>
          <h2>Together We Serve</h2>
        </div>
      </div>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="/zh/index.php">主頁</a></li>
            <li><a href="examples.html">簡介</a>
               <ul>
                <li><a href="#">教會信仰</a></li>
                <li><a href="#">教會歷史</a></li>
                <li><a href="#">教會會眾</a></li>
                <li><a href="#">浸禮與會員</a></li>
                <li><a href="#">地圖</a></li>
                <li><a href="#">聯絡我們</a></li>
              </ul>	
            </li>
            <li><a href="page.html">崇拜</a>
              <ul>
                <li><a href="#">兒童崇拜</a></li>
                <li><a href="#">詩歌</a></li>
                <li><a href="#">網絡信息</a></li>
                <li><a href="#">崇拜時間</a></li>
              </ul>	
            </li>
            <li><a href="another_page.html">進修</a>
              <ul>
                <li><a href="#">兒童主日學</a></li>
                <li><a href="#">成人主日學</a></li>
              </ul>	
            </li>
            <li><a href="#">我們的社區</a>
              <ul>
                <li><a href="#">社區事工</a></li>
                <li><a href="#">兒童事工</a></li>
                <li><a href="#">青少年事工</a></li>
                <li><a href="#">英文堂</a></li>
                <li><a href="#">國語堂</a></li>
              </ul>
            </li>
            <li><a href="events.php">最新活動</a></li>
            <li><a href="<?php switchLanguage('en'); ?>">English</a></li>
          </ul>
        </div>
      </nav>
    </header>