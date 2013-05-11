<?php include $_SERVER['DOCUMENT_ROOT']. '/common/db_conn.php'; ?>		
<?php

function switchLanguage($target){	
	$uri=$_SERVER["REQUEST_URI"];
	$language="en";
	if(preg_match("/\/en\//",$uri)){
		$language="en";
	}
	
	if($target!=$language){
	
		$pattern="/\/".$language."\//";
		$replacement="/".$target."/";
		
		$targetUri=preg_replace("/\/".$language."\//","/".$target."/",$uri);
		if(file_exists("$_SERVER[DOCUMENT_ROOT]$targetUri"))
			print $targetUri;
		else print "/$target/index.php";
	}else print $uri;
 
}

mysql_connect($db_host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query ('SET NAMES utf8');

$query="SELECT * FROM ch_group order by sort_order";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();


?>
   <header>
  	 <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
        	<!--
          <h1><a href="/index.php">Cherry Hill Chinese Christian Church</a></h1>
          <h2>Together We Serve</h2>
         -->
         <img src="../../images/logos/Logo6.png" width="220" height="160" />
        </div>
      </div>        
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="/en/index.php">Homepage</a></li>
            <li><a href="/en/aboutus/statement.php">Introduction</a>
               <ul>
                <li><a href="/en/aboutus/statement.php">Faith Statement</a></li>
                <li><a href="/en/aboutus/vision.php">Mission Statement</a></li>
                <li><a href="/en/aboutus/history.php">Chruch History</a></li>
                <li><a href="/en/aboutus/map.php">Map</a></li>
                <li><a href="/en/aboutus/contactus.php">Contact Us</a></li>
              </ul>		
            </li>
            <li><a href="/en/worship/children_worship.php">Worship</a>
              <ul>
                <li><a href="/en/worship/children_worship.php">Children Worship</a></li>
                <li><a href="/en/worship/hymns.php">Hymns</a></li>
                <li><a href="/en/worship/messages.php">Messages</a></li>
                <li><a href="/en/worship/worship_time.php">Schedule</a></li>
              </ul>	
            </li>
            <li><a href="#">Fellowship</a>
              <ul>
				<?php
				$i=0;
				while ($i < $num) {
					$group_id  =mysql_result($result,$i,"group_id");
					$group_name_en =mysql_result($result,$i,"group_name_en");
					echo ("<li><a href='/en/group/group.php?id=$group_id'>$group_name_en</a></li>");
					$i++;
				} 
				?>                
              </ul>	
            </li>
            <li><a href="/events_en.php">News</a></li>
            <li><a href="<?php switchLanguage('zh'); ?>">中文</a></li>
          </ul>
        </div>
      </nav>
    </header>



 
