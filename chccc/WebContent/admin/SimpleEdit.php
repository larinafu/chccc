<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?> 
<html>
    <head>
	<title>Simple Edit, 所有任务都可在此处完成</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	<script type="text/javascript">
	 $(function() {
	     $("#messageDate" ).datepicker({ dateFormat: "yy-mm-dd" });
	     $("#messageDate" ).datepicker();

	     // $("form :text").width(800);
	     $("#messageDate" ).width(100);
	     $('input[name^="messageSpeaker"]').width(100);
	     
	 });

	</script>
	<style type="text/css">
	 div.header {
	     font-weight: bolder;
	     font-size: 20pt;
	 }
	 td.label {
	     font-size: 13pt;
	     text-align:right;
	     width: 20%;
	 }
	 td.space {
	     width:5%;
	 }
	 label {
	     width: 250px;
	     display: inline-block;
	     text-align: right;
	 }
	 .textBlock{
	     display: inline-block;
	 }
	 label+input, textarea{
	     width: 450px;
	     margin-left: 10px;
	 }
	 #downloadWelcome{
	     display: inline-block;
         margin: 8px;
         border: 1px dashed gray;
	 }
	 .downloadPrompt{
	     border: 1px solid black;
	     animation-name: alertUser;
	     animation-duration: 2s;
	     animation-direction: alternate;
	     animation-iteration-count: infinite;
	 }
	 @keyframes alertUser{
	     from {background-color: white;}
	     to { background-color: red;}
	 }
	 .mustFill>label::after {
	     content: "*";
	     color: red;
	 }
	 .mustFill > label {
	     font-weight: bold;
	 }
	 .workSection {
	     width: 800px;
	     margin: auto;
	     border: 2px solid lightgray;
	     border-radius: 5px;
	     padding: 20px;
	 }
	    .workSection:nth-of-type(2n+1){
	    background-color: gainsboro;
	    }
	 .alert{
	     font-weight: bold;
	    border: 1px dashed red;
	    border-radius: 6px;
	    background-color: Pink;
	    padding: 6px;
	 }
	 li a{
	     font-weight: bold;
	     border-bottom: 1px solid black;
	 }
	 li span{
	     font-weight: bold;
	     border-bottom: 2px solid black;
	 }
	 li{
	     margin-bottom: 8px;
	 }
	 input:read-only {
		 background-color: lightgray;
	 }
	 input:-moz-read-only {
		 background-color: lightgray;
	 }
kbd {
    /*display: inline-block;*/
    margin: 0 .1em;
    padding: 0em .3em 0.1em .3em;
    /*font-family: Arial,"Helvetica Neue",Helvetica,sans-serif;*/
    font-size: 25px;
    line-height: 1.4;
    color: #242729;
    text-shadow: 0 1px 0 #FFF;
    background-color: #e1e3e5;
    border: 1px solid #adb3b9;
    border-radius: 3px;
    box-shadow: 0 1px 0 rgba(12,13,14,0.2),0 0 0 2px #FFF inset;
    white-space: nowrap;
}
.recordButton {
    color: brown;
 }
	</style>
    </head>
    <body>
	<?php include $_SERVER["DOCUMENT_ROOT"]. '/admin/header.php'; ?>	
	<!--  <p id="dbg">debug output:</p> -->
        <div >
	    <h3>技术同工要做的工作：</h3>
            <ol>
		<li>打开音响系统的电源(多处)， 需要打开的开关旁贴有指示胶带(当前有3处)。调整混音器各路的音量(要调的下面有小磁贴标记)， 给话筒和翻译机安装电源。 牧师用的耳机式话筒安电池后放到唱诗班化妆间洗手池边。 打开两台计算机电源， 用遥控器打开两台投影仪， 从侧面看一下下面讲台正对的电视机是否已打开， 如没有则用电视遥控器指向电视机打开。 </li>
		<li>从两台计算机的 "favorite/dropbox/sundayservice" 文件夹中用时间排序显示文件, 找到今天要用的两个PPT文件， 可复制到计算机桌面并用PowerPoint打开以方便使用。 两台都要做以便用桌子上的 A/B 按钮无缝切换显示。或者使用 <a href="/file3927" target="_blank"  > /file3927  服务器共享目录 ↗</a> 下载讲道文件。  </li>
		<li>用PowerPoint打开讲道信息文件， 选择PowerPoint Menu: "File => Export..."功能保存成 pdf 文件。 记住保存文件的路径和名称。 执行下面的<a href="#TaskA">任务 A </a>, 上传今日信息pdf文件, 创建信息数据库记录， 有"*"的是必填信息。 </li> 
		<li>在计算机A的Windows中打开'Audacity"程序， 从菜单选 "File => New" 再打开一个窗口， Window桌面现在共两个Audacity窗口， 一个用来录诗班唱歌，下面称为'Audacity'窗口 1，  另一个用来录讲道信息， 下面称为'Audacity'窗口 2 。 程序窗口中圆形按钮 <kbd class="recordButton">●</kbd> 为录音开始， 方形 <kbd>■</kbd> 为停止。 </li>
		<li>选择应使用的ppt文件窗口, 用鼠标点一下使之变成当前活跃窗口， 以便键盘和讲台遥控器输入可以送给它。 按 "F5" 可使之全屏; 而“SHIFT" + "F5" 可从当前页开始; 键盘上下箭头键可以翻页， 配合讲台同工同步显示相应内容。 <span>计算机 B 为主要显示源。</span>  注意桌子上的（A/B） 黑色按钮，  切换PPT时可先在计算机A临时打开PPT，按（A/B）按钮 切换到到投影仪， 待计算机B也打开后再切换回来， 从而完成两个PPT 的无缝切换。<span>键盘上下键配合翻页。</span> 一般歌曲需要翻页， 讲道翻页由讲员控制。</li>
		<li>在<span>唱诗班开始唱歌时</span>按下'Audacity'窗口 1 的录音开始按钮<kbd class="recordButton">●</kbd>， <span>结束时</span>按下结束按钮<kbd>■</kbd>， 然后选择 Menu : "File => Export Audio" 功能存成mp3文件。 记住文件路径和保存文件名。 执行下面的<a href="#TaskB">任务 B </a>, 填写诗歌名称并选择待上传文件</li>
		<li><span>讲员开始讲道时, 'Audacity'窗口 2</span>按下 <kbd class="recordButton">●</kbd> 开始录音， <span>结束后</span>按下停止 <kbd>■</kbd> 并选 Menu: "File => Export Audio" 成mp3 文件， 记住文件路径和你给的文件名， 执行<a href="#TaskC">任务 C </a>, 上传讲道声音mp3文件</li>
		<li>在 任务 D 迎新文件下载链接<span>变色</span>时， 执行<a href="#TaskD">任务 D </a>, 下载迎新文件到Windows桌面， 用PowerPoint 打开以便使用（F5 全屏显示)。在Computer B 显示迎新时用桌子上的（A/B）键切换到Computer A 并配合讲台翻页显示。</li>
		<li>结束后关闭投影仪， 音响电源， 回收话筒和翻译机， 拿出电池充电。</li>
		<li class="alert">注意: 每次操作别的应用窗口后，都要用鼠标点一下正在播放的PowerPoint窗口，使其成为当前活跃窗口接收键盘和遥控器输入。 不然下面讲台遥控器有可能不能换页。</li>
	    </ol>
        </div>
	<hr/>
	<div class="workSection" id="TaskA">
	    <h2>任务 A: 上传今日信息pdf文件记录</h2>
	    <p>上传今日信息pdf文件, 创建信息数据库记录， 更新网站首页. 如需生成多于一个的记录， 请手动修改pdf和mp3文件名然后依次完成 Task A 和 Task C. 修改记录请使用页面最上面的 “主日信息管理“ 功能。 </p>
	    <!-- Use form without action, it will handled by js ajax call  -->
	    <form method="POST" id="messagePdfForm" name="messagePdfForm"  enctype="multipart/form-data" >
		<!-- since no id or name of form passed to server, use hidden input as id -->
		<input type="hidden" name="formType" value="messagePdfForm"/>
		
		<div class="mustFill"><label>中文讲员:</label><input type="text" name="messageSpeaker" id="messageSpeaker" /></div>
		
		<div class="mustFill"><label>中文信息标题:</label><input type="text" name="messageTitle" id="messageTitle" /></div>
		<div class="mustFill"><label>选择待上传信息pdf文件:</label><input type="file" accept=".pdf"  name="messagePdfFile" id="messagePdfFile" value="选择pdf文件..." /></div>
		<div ><label>信息PDF网站保存文件名:</label><input type="text" name="messagePdfFileName" id="messagePdfFileName" /></div>
		<div ><label>信息日期:</label><input type="text" name="messageDate" id="messageDate" /></div>
		<div ><label>信息音频网站保存文件名:</label><input type="text" name="messageAudioFileName" id="messageAudioFileName1" oninput="syncAudioFileName()" /></div>
		<div><label>英文讲员:</label><input type="text" name="英文信息标题:" id="英文信息标题:" /></div>
		<div><label>信息视频网站保存文件名:</label><input type="text" name="messageVideoFileName" id="messageVideoFileName" /></div>
		<div><label>中文经文:</label><textarea type="text" name="bibleVerse" id="bibleVerse"  rows="4" ></textarea></div>
		<div><label>英文经文:</label><textarea type="text" name="bibleVerseEn" id="bibleVerseEn"   rows="4" ></textarea></div>
		<div><label title="如设置， 网站主页立即显示记录" >是否立即主页可见?:</label><input type="checkbox" name="published" id="published" title="如设置， 网站主页立即显示记录" checked /></div>
		<div><label>是否培訓?:</label><input type="checkbox" name="isTraining" id="isTraining" /></div>
		

		<div>
		    <button id="messagePdfSubmit" name="messagePdfSubmit" value="上传文件并创建记录" onclick="handleForm(event)" >上传文件并创建记录</button>
		    <p><span id="messagePdfUploadReport"></span><a href="/" target="_blank" >浏览主页查看新产生记录...</a></p>
		</div>
	    </form>
	</div>
	<hr/>

	<div class="workSection" id="TaskB" >
	    <h2>任务 B: 创建唱诗班唱诗记录</h2>
	    <div><p>填写诗歌名称并选择待上传文件， 修改记录请使用页面最上面的 “诗歌管理”。</p></div>
	    <form method="POST" enctype="multipart/form-data" id="hymnForm" name="hymnForm" >
		<input type="hidden" name="formType" value="hymnForm"/>
		<div class="mustFill"><label>诗歌名:</label><input type="text" name="musicTitle" id="musicTitle" /></div>
		<div class="mustFill"><label>选择待上传诗歌mp3文件..:</label><input type="file" accept=".mp3"  name="musicAudioMp3File" id="musicAudioMp3File" /></div>
		<div ><label>诗歌音频文件服务器保存名(.mp3):</label><input type="text" name="musicAudioFileName" id="musicAudioFileName"  /></div>
		<div><label>日期:</label><input type="text" name="musicDate" id="musicDate" /></div>
		<div><label title="主页立即可见变化。">是否主页立即显示？(publish):</label><input type="checkbox" name="musicPublished" id="musicPublished" value="1" checked title="主页立即可见变化" /></div>
		<div>
		    <button id="hymnSubmit" onclick="handleForm(event)" >上传诗班声音文件并创建记录</button>
		    <div class="textBlock">
			<p>
			<span id="hymnAudioUploadReport"></span>
			<a target="_blank" href="/" >查看提交后的主页</a>
			</p>
		    </div>
		</div>
	    </form>
	</div>
	<hr/>

	<div class="workSection"  id="TaskC">
	    <h2>任务 C: 上传讲道信息声音文件(mp3 audio)</h2>
	    <p>请确保先上传pdf文件, 已产生网站 pdf 数据库记录（完成Task A）。 支持上传任意大小的文件， 不再受网站50M大小的限制。 </p>
	    <form method="POST" enctype="multipart/form-data" id="messageAudioForm" name= "messageAudioForm" >
		<input type="hidden" name="formType" value="messageAudioForm"/>
		<div >
		    <label>服务器保存文件名称</label>
		    <input type="text" id="messageAudioFileName2" name="messageAudioFileName" readonly />
		</div>
		<div class="mustFill"><label>选择待上传信息mp3文件..</label><input type="file" accept=".mp3" name="messageAudioFile" id="messageAudioFile" /></div>
		<div id="messageAudioUploadProgress" class="progressbar"></div>
		<div>
		    <button id="messageAudioSubmit" onclick="handleForm(event)" >上传信息声音文件</button> <div class="textBlock"> <p><span id="messageAudioUploadReport"></span> <a target="_blank" href="/">查看提交后的主页</a></p></div>
		</div>	
	    </form>
	</div>
	<hr/>


	<div class="workSection"  id="TaskD" >
	    <h2>任务 D:下载迎新文件(.ppt)</h2>
	    <div><p><span>系统每半分钟检查一次迎新同工生成的文件, 如有改变即可下载.   </span><p></div>
		<div id="downloadWelcome"  ><span><a onclick="endDownloadPrompt();"  id="welcomeFileLink"> 同工还没有产生今日迎新文件， 请等待...</span></p></div>
         <p><span>或者可以自己填表生成:</span><a href="/welcome3927.php" target="_blank" >迎新文件生成 ↗</a></p>
	</div>
	<hr />
	<div style="width: 800px; display:none"> <!-- debug section, use browser developer tool to remove display:none css to show it. -->
	    <div id="dbg">dbg:</div>
	    <!-- 
		 Clear today's record for debugging. Will remove ch_message, ch_music where message_date, music_date == today date, respectivelly.
		 Remove today's  hymn and message mp3 files in /ChineseSundayMessage/  and message pdf and welcome files in /ChineseSundayMessage/PDF
	    -->
	    <div >
		
		<form method="post"  id="deleteTodayForm" name="deleteTodayForm" >
		    <input type="hidden" name="formType" value="deleteTodayForm" />
		    <div><label>今天日期：ISO yy-mm-dd, yy(4d)</label><input type="text" name="todayDate" id="todayDate" /></div>
		    <div><label>信息PDF</label><input type="text" id="deleteMessagePdf"  name="messagePdf" /></div>
		    <div><label>信息MP3</label><input type="text" id="deleteMessageMp3" name="messageMp3" /></div>
		    <div><label>唱诗MP3</label><input type="text" id="deleteHymnMp3"  name="hymnMp3" /></div>
		    <div><label>迎新pptx</label><input type="text" id="deleteWelcome"  name="welcomeFile" /></div>
		    <div><label>真正执行删除， 而不是 仅仅查看：</label><input type="checkbox" name="reallyDelete" id="reallyDelete" />
			<div>   <button onclick="fillDeleteForm(event)" >自动填表</button>
			    <button id="deleteTodaySubmit" onclick="handleForm(event)">查看/删除今日相关记录。</button></div>
		</form>
		    </div>
	    </div>
	    <script>
		 
	     function dbg(output){
		 $("#dbg").append("<p>" + output + "</p>");
	     }
		 function syncAudioFileName(){
			
	          document.getElementById('messageAudioFileName2').value= document.getElementById('messageAudioFileName1').value;
		 }
	     function fillDeleteForm(evt){
		 var sdate = new Date();
		 $("#todayDate").val(getIsoDate(sdate));
		 $("#deleteMessagePdf").val(getFileName(sdate, "messagePdf"));
		 $("#deleteMessageMp3").val(getFileName(sdate, "messageAudioMp3"));
		 $("#deleteHymnMp3").val(getFileName(sdate, "hymnAudioMp3"));
		 $("#deleteWelcome").val(getFileName(sdate, "welcomePptx"));
		 $("#reallyDelete").attr("checked", false);
		 if(evt){
		     evt.preventDefault();
		 }
		 return false;
	     }
	     // call it to fill first for new user.
	     fillDeleteForm();
	     //It'stupid to format date like this!
	     // message pdf file pattern is: 's'mmddyy.pdf; // chant to sermon-yyyy-mm-dd.pdf
	     // The file name  format of message audio is mmddyyyy.mp3, // sermon-yyyy-mm-dd.mp3
	     // hymn audio file name pattern is 'm'mmddyy.mp3 // hymn-yyyy-mm-dd.mp3

	     function getIsoDate(sdate){ //2019-03-23 format.
		 return sdate.toISOString().split('T')[0];
	     }

	     // The welcome file ppt will be welcome-yyyy-mm-dd.pptx (ISO date format).
	     function getFileName(sdate, nameType){
		 var year4 = sdate.getFullYear();
		 var mon = sdate.getMonth() + 1; // Jan is 0!
		 var day = sdate.getDate();
		 mon = mon < 10 ? '0' + mon : mon;
		 day = day < 10 ? '0' + day : day ;
		 var fn;
		 switch( nameType ){
		     case "messagePdf":
			 //fn = "s" + mon + day + year4.toString().substring(2) + ".pdf";
			 fn = "sermon-" + getIsoDate(sdate) + ".pdf";
			 break;
		     case "messageAudioMp3":
			 //fn = "" + mon + day + year4 + ".mp3";
			 fn = "sermon-" + getIsoDate(sdate) + ".mp3";
			 break;
		     case "hymnAudioMp3":
			 //fn = "m" + mon + day + year4.toString().substring(2) + ".mp3" ;
			 fn = "hymn-" + getIsoDate(sdate) + ".mp3" ;
			 break;
		     case "welcomePptx":
			 fn = "welcome-" + year4 + "-" + mon + "-" + day + ".pptx";
			 break;
			 
		 }
		 return  fn ;
	     }

	     // from submit button id to form name.
	     var formNames={
		 welcomeSubmit:"welcomeForm",
		 messagePdfSubmit:"messagePdfForm",
		 hymnSubmit: "hymnForm",
		 messageAudioSubmit: "messageAudioForm",
		 deleteTodaySubmit: "deleteTodayForm"
	     };
	     // form name to {progress div id, progress text report id}
	     var formToProgressControls={
		 messagePdfForm: ["","#messagePdfUploadReport"],
		 hymnForm: ["","#hymnAudioUploadReport"],
		 messageAudioForm:["#messageAudioUploadProgress","#messageAudioUploadReport"]
	     }
	     // check the upload field to make sure user have selected the file.
	     var formToUploadFieldName = {
		 messagePdfForm: "messagePdfFile",
		 hymnForm:"musicAudioMp3File",
		 messageAudioForm:"messageAudioFile"
	     }

		 //The fields need to be filled. 
		 var formToRequiredFields = {
		 messagePdfForm: ["messageSpeaker", "messageTitle" ],
		 hymnForm:["musicTitle" ],
		 
	     }

	     var uploadHardLimit = 49 * 1024 * 1024 ;// yahoo limit 50M upload.

		 //------ normal form handler. ----------------------------------------------------
	     function handleForm(event){
		 var btnName = event.target.id;
		 
		 var formName = formNames[btnName];
		 var hasFileUpload = Object.keys(formToUploadFieldName).indexOf(formName) >= 0;
		 event.preventDefault();
		 if(!formName ){
		     alert("can not find form name");
		     return false;
		 }
		 var requiredFields = formToRequiredFields[formName];
		 if (requiredFields && requiredFields.length > 0){
			 for(var kk = 0; kk < requiredFields.length ; kk ++ ){
				 if (document.getElementById(requiredFields[kk]).value.trim().length == 0 ){
					 alert("请填写带*的地方。 Please fill the required fields.");
					 return false;
				 }
			 }
		 }
		 
		 
		 var fileFieldName = formToUploadFieldName [formName];
		 var htmlFiles =  hasFileUpload? $('#' +fileFieldName)[0].files :[]; 
		 var formData = new FormData(document.getElementById(formName) );
		 dbg(formToUploadFieldName[formName] + JSON.stringify(formData.get(formToUploadFieldName[formName] ) ) ) ;
		 // Weird chrome will put an empty 'file' record in the formData. Must check the 
		 // form to determine if the file been selected! Can not use formData !!
		 if (hasFileUpload && ( !formData.get(formToUploadFieldName[formName] ) || formData.get(formToUploadFieldName[formName] ).length <= 0 || htmlFiles.length <= 0 ) ){
		     alert("请先选择待上传文件");
		     return;
		 }
		 
		 if(formName != "messageAudioForm" && hasFileUpload && htmlFiles[0].size >= uploadHardLimit){
		     alert("File size exceeds limit. 文件超过上传限制， 无法进行。 " );
		     return false;;
		 }
		 // Special handling mp3 audio. Will only pass the fileName and the file. No other fields will pass.
		 if ( formName == "messageAudioForm"  && htmlFiles[0].size >= uploadHardLimit  ){
			 console.log("Special handling audioFile big size upload (>49M).");
			//streamPost(formName, "ajaxFormHandler.php", document.getElementById("messageAudioFileName2").value, htmlFiles[0], $(formToProgressControls[formName][1])[0] ); 
			// jquery $ return array!
			postBigFile( 10*1024*1024 /*10M chunk upload*/ , formName, formData, fileFieldName, "ajaxFormHandler.php", document.getElementById("messageAudioFileName2").value, htmlFiles[0], $(formToProgressControls[formName][1])[0] ); 
			 return false;
		 }
		 console.log(formData);
		 console.log(document.getElementById(formName));
		 // Must limit the 
		 var transferStart = Date.now();
		 var xhr =   $.ajax({
		     url:"ajaxFormHandler.php",
		     dataType: "text",
		     cache: false,
		     contentType: false,
		     processData: false,
		     data: formData,
		     type: "post",
		     success: function(res){
			 dbg(formName + " success:" + res);
		     },
		     error: function(jq, status, error){
			 dbg(formName + " error return:"+ JSON.stringify(jq)+" :: "+ status + " :: "+error);
		     },
		     xhr: function(){
			 var xhr = $.ajaxSettings.xhr();
			 if(hasFileUpload){
			     xhr.upload.onprogress = function(evt){
				 if ( evt.lengthComputable){
				     var percent = Math.round( (evt.loaded*100.0)/evt.total);
				     //updateUploadProgress(formName, percent);
				     //$(formToProgressControls[formName][0]).progressbar({value:percent});
					 $(formToProgressControls[formName][1]).text("uploaded: "+  percent + "% of " + (evt.total/(1024*1024)).toFixed(2) + "MB " );
					 if (evt.loaded == evt.total){
						 var progressControl = $(formToProgressControls[formName][1])[0]; 
						 var passedSec = Math.ceil ( (Date.now() - transferStart)/1000 ) ;
						var min = Math.floor( passedSec / 60 ) ;//minutes.
						var sec = Math.ceil( passedSec % 60 );
						var speed = ( evt.loaded /(1024*1024*passedSec)).toFixed(3);
						var summary = "速度：" + speed + " MB/秒， " + " 用时：" + (min == 0? sec + " 秒" : min + "分 " + sec + " 秒") + " 传输 " + (evt.total/(1024*1024)).toFixed(2) + "MB ";
						progressControl.innerText = summary ;
					 }
				 }
			     };
			 }
			 return xhr;
		     }
		 });
		 
		 } // end of normal form handler.
		 
		 var chunkDataList=[];
		 // Split file into chunks and upload them one by one. Server will write file to destination and late combine them via file stream merge.
		 function postBigFile(chunkLimit, formType, formData, fileFieldName, handler, serverFileName, fileField, progressControl){
			 //var chunkLimit = 2 * 1024 * 1024 ;// 2M size
			 var bigFile = fileField;
			 // try to split file into equal size chunks.
			 var chunkCount = Math.ceil( bigFile.size / chunkLimit );
			 var chunkSize = Math.ceil( bigFile.size / chunkCount );
			 var fileNameStem = (Math.random().toString(36)+ "0000000000").slice(2,8) ;
			 var fileNames = [];
			 for( var i = 0; i < chunkCount ; i ++ ){
				 var chunkBlob = bigFile.slice(i*chunkSize , (i+1)*chunkSize > bigFile.size ? bigFile.size : (i+1)*chunkSize );
				 var fd = new FormData();
				 var chunkName = "chunk-" + fileNameStem + "-"+i;
				 fileNames.push(chunkName);
				 fd.append("saveName", chunkName);
				 fd.append("formType", "chunkPostForm"); // used to route handler.

				 fd.append("fileData", chunkBlob, chunkName);
				dbg("chunkName:" + chunkName  + " !!!!!fileField:" + fileFieldName);
				 chunkDataList.push({fd:fd, chunkIndex: i, total:bigFile.size, chunkSize: chunkSize  });
				 //send it out async.
				 // I want await!
			 }
			 // At last, push original data as the loast task to send.

			 // clear old file object send it's been send already, just give it the list of file names.
			 dbg("@@@@@@@@@@ last : fileField:" + fileFieldName);
			 formData.delete(fileFieldName);

			 //formData.append(fileFieldName, JSON.stringify( fileNames) );
			 // Yahoo hosting json_decode can not decode the simple string array!
			 for(var j= 0; j < fileNames.length; j++){
				 formData.append(fileFieldName+"[]", fileNames[j]);
			 }
			 
			 chunkDataList.push({fd: formData });


			 bigPostStart = Date.now();
			 bigPostSize = bigFile.size;
			 sendChunk(progressControl);
		 }
		 // record speed info.
		 var bigPostStart ;
		 var bigPostSize ;
		 
		 function sendChunk(progressControl){
			 var thisChunk = chunkDataList.shift();
			 
			 if(thisChunk){
				 dbg("-thisChunk:" + thisChunk.fd.get("formType"));
				 $.ajax({
					 type: "post",
					 data: thisChunk.fd,
					 processData: false,
					 contentType: false,
					 dataType: 'text',
					 url: "ajaxFormHandler.php", // have a formType to route the call.
					 cache: false,
					success: function(res){
						dbg("done chunk:" + thisChunk.chunkIndex + " " + res);
						sendChunk(progressControl);
					},
					error: function(jq, status, error){
						dbg("sendChunk:" + " error return:"+ JSON.stringify(jq)+" :: "+ status + " :: "+error);
						dbg(" clear the sending list for late retry");
						chunkDataList = [];
					},
					xhr: function(){
			 			var xhr = $.ajaxSettings.xhr();
			 				if( xhr.upload ){
			     				xhr.upload.onprogress = function(evt){
				 					if ( evt.lengthComputable){
				     					//var percent = Math.round( (evt.loaded*100.0)/evt.total);
				     //updateUploadProgress(formName, percent);
				     //$(formToProgressControls[formName][0]).progressbar({value:percent});
										 //$(formToProgressControls[formName][1]).text("uploaded: "+  percent + "% of " + (evt.total/(1024*1024)).toFixed(2) + "MB ");
										 updateProgress(evt.loaded, thisChunk.chunkIndex, thisChunk.chunkSize, progressControl);
				 					}
			     };
			 			}
			 			return xhr;
		     		}
				 });
			 } else {
				 dbg("Done chunk sending,  real form process is the last one...");
			 }
		 }
		 function updateProgress(currentLoaded, chunkIndex, chunkSize, progressControl ){
			dbg("-------upload: " + " currentLoaded:" + currentLoaded + " index:" + chunkIndex ) ;
			if( chunkIndex !== undefined){
				var percent = Math.round( ((chunkSize*chunkIndex + currentLoaded )*100.0)/bigPostSize);
				progressControl.innerText = "uploaded: "+  percent + "% of " + ( bigPostSize/(1024*1024)).toFixed(2) + "MB ";
			}else{
				//it's last. calc speed and report final result?
				var passedSec = Math.ceil ( (Date.now() - bigPostStart)/1000 ) ;
				var min = Math.floor( passedSec / 60 ) ;//minutes.
				var sec = Math.ceil( passedSec % 60 );
				var speed = (bigPostSize /(1024*1024*passedSec)).toFixed(3);
				var summary = "速度：" + speed + " MB/秒， " + " 用时：" + (min == 0? sec + " 秒" : min + "分 " + sec + " 秒") + " 传输 " + (bigPostSize/(1024*1024)).toFixed(2) + "MB ";
				progressControl.innerText = summary ;
			}
		 }


		 // For big file upload, we use stream to overcome the upload size limit and php server memory size limit.
		 //  Somehow, yahoo web hosting try to load whole file in the memory and cause 500 internal error.
		 // Have to split file into small chunks to transfer.
		 function streamPost(formType, handler, serverFileName, fileField, progressControl ){
			 //var postUrl = handler + encodeURIComponent("?saveFileName="+serverFileName);
			// passed fileField (File) is actually a blob can be send directly.
			var xhr = new XMLHttpRequest();
			xhr.open("POST", handler, true /*async, critical for stream handling on php side. */);
			xhr.setRequestHeader("mysaveFileName", serverFileName); // becomes HTTP_MYFORMTYPE, no "_" allowed in header!!
			xhr.setRequestHeader("myformType", formType);
			console.log("Use streamPost!!")
			var startTime = Date.now();
			var fileSize = fileField.size;
			xhr.upload.onprogress=function(evt){
				 if ( evt.lengthComputable){
				     var percent = Math.round( (evt.loaded*100.0)/evt.total);
				     //updateUploadProgress(formName, percent);
				     //$(formToProgressControls[formName][0]).progressbar({value:percent});
				     progressControl.innerText = "uploaded: "+  percent + "% of " + (evt.total/(1024*1024)).toFixed(2) + "MB ";
				 }
				 
			}
			xhr.upload.onload=function(evt){
				dbg("xhr onload event");
				// the upload succefully!
				// TODO: report total transfer time, size and speed.
				var passedSec = Math.ceil ( (Date.now() - startTime)/1000 ) ;
				var min = Math.floor( passedSec / 60 ) ;//minutes.
				var sec = Math.ceil( passedSec % 60 );
				var speed = (fileSize /(1024*1024*passedSec)).toFixed(3);
				var summary = "速度：" + speed + " MB/秒， " + " 用时：" + (min == 0? sec + " 秒" : min + "分 " + sec + " 秒") + " 传输 " + (fileSize/(1024*1024)).toFixed(2) + "MB ";
				progressControl.innerText = summary ;
			}
			xhr.onreadystatechange = function () {
				if(xhr.readyState == 4){
					if(xhr.status == 200){
						//success
						dbg("-----stream OK!");
					}else{
						//error.
						dbg("------stream error");
					}
					dbg("--response:" + xhr.responseText);
				}
			}
			xhr.send(fileField);
		 }


	     //routines to let user know when the welcome guest file is ready.
	     function startDownloadPrompt(){
		 $("#downloadWelcome").addClass("downloadPrompt");
	     }
	     function endDownloadPrompt(){
		 $("#downloadWelcome").removeClass("downloadPrompt");
	     }
	     function setDownloadHref(welcomeHref){
		 $("#welcomeFileLink").attr("href",welcomeHref);
		 $("#welcomeFileLink").text("请下载今日迎新文件...");
	     }

	     var checkWelcomeFileDuration=  30000; //millisecond, 30s.
	     var inChecking; // true means in checking already.
	     var lastmtime; // if it changes means user regenerate the file, should prompt.
	     function  checkWelcomeFile(){
		 if (! inChecking ){
		     var now = new Date();
		     var checkForm = new FormData();
		     checkForm.append("formType", "checkWelcomeFile");
		     checkForm.append("welcomeFileName", getFileName(now, "welcomePptx"));
		     var jqXhr = $.ajax({
			 url:"ajaxFormHandler.php",
			 dataType: "json",
			 cache: false,
			 contentType: false,
			 processData: false,
			 data: checkForm,
			 type: "post",
			 success: function(res){
			     if (res["href"] && lastmtime != res["mtime"] ){
				 setDownloadHref(res["href"]);
				 startDownloadPrompt();
				 lastmtime = res["mtime"];
			     }
			     // dbg("success:return from php ajax check:" + JSON.stringify(res) );
			     inChecking = false;
			 },
			 error: function(jq, status, error){
			     dbg("return:"+ JSON.stringify(jq)+" :: "+ status + " :: "+error);
			     inChecking = false;
			 }
		     });
		     inChecking = true;
		 }
	     }
	     var checkTimer = setInterval( checkWelcomeFile , checkWelcomeFileDuration );
	     checkWelcomeFile();
	     // fill the field with value we should know.
	     var today = new Date();
	     // 信息日期: format: "yy-mm-dd" yy in jquery UI MEANS 4 digitals, NOT 2 digitals. It's first part of ISO date!
	     var isoDate = today.toISOString().split('T')[0];
	     $("#messageDate").val(isoDate);
	     $("#musicDate").val(isoDate);
	     $("#messagePdfFileName").val(getFileName(today,"messagePdf" ));
	     $("#messageSpeaker").val("李紹沅牧師" ); // Change this if we change pastor.
	     $("#messageAudioFileName1").val(getFileName(today,"messageAudioMp3"));
	     $("#messageAudioFileName2").val(getFileName(today,"messageAudioMp3"));
	     $("#musicAudioFileName").val(getFileName(today,"hymnAudioMp3"));
	    </script>
    </body>
</html>
