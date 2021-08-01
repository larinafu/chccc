<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?> 
<html>
    <head>
<title>Simple Edit (English), 所有任务都可在此处完成(英文编辑)</title>
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
	</style>
    </head>
    <body>
	<?php include $_SERVER["DOCUMENT_ROOT"]. '/admin/header.php'; ?>
<h1> 英文讲道记录创建及录音上传 </h1>
	<!--  <p id="dbg">debug output:</p> -->
        <div >
	    <h3>说明：</h3>
         <ul>
         <li>英文audio(mp3)保存在服务器的/ChineseSundayMessage/EnglishService 目录</li>
         <li>pdf 文件应保存在/ChineseSundayMessage/EnglishService/PDF 目录下</li>
         <li>带*号的请务必填写， pdf 文件名可不填写。</li>
         </ul>
        </div>
	<hr/>
	<div class="workSection" id="TaskA">
         <h2>任务 A: 上传今日信息记录(For English, pdf文件可不传)</h2>
	    <p>上传今日信息pdf文件, 创建信息数据库记录， 更新网站首页. 如需生成多于一个的记录， 请手动修改pdf和mp3文件名然后依次完成 Task A 和 Task C. 修改记录请使用网站 “/admin“ 目录中的相应功能。 </p>
	    <!-- Use form without action, it will handled by js ajax call  -->
	    <form method="POST" id="ENMessagePdfForm" name="ENMessagePdfForm"  enctype="multipart/form-data" >
		<!-- since no id or name of form passed to server, use hidden input as id -->
		<input type="hidden" name="formType" value="ENMessagePdfForm"/>
		
		<div class="mustFill"><label>讲员:</label><input type="text" name="messageSpeaker" id="messageSpeaker" /></div>
		
		<div class="mustFill"><label>信息标题:</label><input type="text" name="messageTitle" id="messageTitle" /></div>
		<div ><label>选择待上传信息pdf文件:</label><input type="file" accept=".pdf"  name="messagePdfFile" id="messagePdfFile" value="选择pdf文件..." /></div>
		<div ><label>信息PDF网站保存文件名:</label><input type="text" name="messagePdfFileName" id="messagePdfFileName" /></div>
		<div ><label>信息日期:</label><input type="text" name="messageDate" id="messageDate" /></div>
		<div ><label>信息音频网站保存文件名:</label><input type="text" name="messageAudioFileName" id="messageAudioFileName1" oninput="syncAudioFileName()" /></div>
		<!--<div><label>英文讲员:</label><input type="text" name="messageTitleEn" id="英文信息标题:" /></div>-->
		<div><label>信息视频网站保存文件名:</label><input type="text" name="messageVideoFileName" id="messageVideoFileName" /></div>
		<div><label>经文:</label><textarea type="text" name="bibleVerse" id="bibleVerse"  rows="4" ></textarea></div>
		<!--<div><label>英文经文:</label><textarea type="text" name="bibleVerseEn" id="bibleVerseEn"   rows="4" ></textarea></div>-->
		<div><label title="如设置， 网站主页立即显示记录" >是否立即主页可见?:</label><input type="checkbox" name="published" id="published" title="如设置， 网站主页立即显示记录" checked /></div>
         <!-- <div><label>是否培訓?:</label><input type="checkbox" name="isTraining" id="isTraining" /></div> -->
		

		<div>
		    <button id="ENMessagePdfSubmit" name="ENMessagePdfSubmit" value="上传文件并创建记录" onclick="handleForm(event)" >上传文件并创建记录</button>
                        <p><span id="messagePdfUploadReport"></span><br/><a href="/en/" target="_blank" >浏览主页查看新产生英文记录(English)...</a></p>
		</div>
	    </form>
	</div>
	<hr/>

	<div class="workSection"  id="TaskC">
	    <h2>任务 C: 上传讲道信息声音文件(mp3 audio for English)</h2>
	    <p>请确保先上传pdf文件, 已产生网站 pdf 数据库记录（完成Task A）。 支持上传任意大小的文件， 不再受网站50M大小的限制。 </p>
                        <p>也可在修改“服务器保存文件名称”后上传audio文件, 文件将以填写的文件名保存在服务器目录/ChineseSundayMessage/EnglishService/下， 请确保数据库中有记录指向此文件。</p>
	    <form method="POST" enctype="multipart/form-data" id="ENMessageAudioForm" name= "ENMessageAudioForm" >
		<input type="hidden" name="formType" value="ENMessageAudioForm"/>
		<div >
		    <label>服务器保存文件名称</label>
		    <input type="text" id="messageAudioFileName2" name="messageAudioFileName"  />
		</div>
		<div class="mustFill"><label>选择待上传信息mp3文件..</label><input type="file" accept=".mp3" name="messageAudioFile" id="messageAudioFile" /></div>
		<div id="messageAudioUploadProgress" class="progressbar"></div>
		<div>
                        <button id="ENMessageAudioSubmit" onclick="handleForm(event)" >上传信息声音文件</button> <div class="textBlock"> <p><span id="messageAudioUploadReport"></span> <a target="_blank" href="/en/">查看提交后的英文主页(English)</a></p></div>
		</div>	
	    </form>
	</div>
	<hr/>


	<div style="width: 800px; display:none"> <!-- debug section, use browser developer tool to remove display:none css to show it. -->
	    <div id="dbg">dbg:</div>
	    <!-- 
		 Clear today's record for debugging. Will remove ch_message, ch_music where message_date, music_date == today date, respectivelly.
		 Remove today's  hymn and message mp3 files in /ChineseSundayMessage/  and message pdf and welcome files in /ChineseSundayMessage/PDF
	    -->
	    <div >
		
		<form method="post"  id="ENDeleteTodayForm" name="ENDeleteTodayForm" >
		    <input type="hidden" name="formType" value="ENDeleteTodayForm" />
		    <div><label>今天日期：ISO yy-mm-dd, yy(4d)</label><input type="text" name="todayDate" id="todayDate" /></div>
		    <div><label>信息PDF</label><input type="text" id="deleteMessagePdf"  name="messagePdf" /></div>
		    <div><label>信息MP3</label><input type="text" id="deleteMessageMp3" name="messageMp3" /></div>
		    <div><label>唱诗MP3</label><input type="text" id="deleteHymnMp3"  name="hymnMp3" /></div>
		    <div><label>迎新pptx</label><input type="text" id="deleteWelcome"  name="welcomeFile" /></div>
		    <div><label>真正执行删除， 而不是 仅仅查看：</label><input type="checkbox" name="reallyDelete" id="reallyDelete" />
			<div>   <button onclick="fillDeleteForm(event)" >自动填表</button>
			    <button id="ENDeleteTodaySubmit" onclick="handleForm(event)">查看/删除今日相关记录。</button></div>
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
			 fn = "en-sermon-" + getIsoDate(sdate) + ".pdf";
			 break;
		     case "messageAudioMp3":
			 //fn = "" + mon + day + year4 + ".mp3";
			 fn = "en-sermon-" + getIsoDate(sdate) + ".mp3";
			 break;
		     case "hymnAudioMp3":
			 //fn = "m" + mon + day + year4.toString().substring(2) + ".mp3" ;
			 fn = "en-hymn-" + getIsoDate(sdate) + ".mp3" ;
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
		 deleteTodaySubmit: "deleteTodayForm",
         ENDeleteTodaySubmit: "ENDeleteTodayForm",
         ENMessageAudioSubmit: "ENMessageAudioForm",
         ENMessagePdfSubmit:"ENMessagePdfForm",
	     };
	     // form name to {progress div id, progress text report id}
	     var formToProgressControls={
		 messagePdfForm: ["","#messagePdfUploadReport"],
         ENMessagePdfForm: ["","#messagePdfUploadReport"],
		 hymnForm: ["","#hymnAudioUploadReport"],
		 messageAudioForm:["#messageAudioUploadProgress","#messageAudioUploadReport"],
         ENMessageAudioForm:["#messageAudioUploadProgress","#messageAudioUploadReport"]
	     }
	     // check the upload field to make sure user have selected the file.
	     var formToUploadFieldName = {
		 messagePdfForm: "messagePdfFile",
		 ENMessagePdfForm: "messagePdfFile",
		 hymnForm:"musicAudioMp3File",
		 messageAudioForm:"messageAudioFile",
         ENMessageAudioForm:"messageAudioFile"
	     }

		 //The fields need to be filled. 
		 var formToRequiredFields = {
		 messagePdfForm: ["messageSpeaker", "messageTitle" ],
		 ENMessagePdfForm: ["messageSpeaker", "messageTitle" ],
		 hymnForm:["musicTitle" ],
         ENMessagePdfForm: ["messageSpeaker", "messageTitle" ],
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
		 // English allow no pdf record to be created.
		 if (hasFileUpload && formName !== "ENMessagePdfForm" && ( !formData.get(formToUploadFieldName[formName] ) || formData.get(formToUploadFieldName[formName] ).length <= 0 || htmlFiles.length <= 0 ) ){
		     alert("请先选择待上传文件");
		     return;
		 }
		 
		 if(formName != "ENMessageAudioForm" && hasFileUpload && htmlFiles.length > 0 && htmlFiles[0].size >= uploadHardLimit){
		     alert("File size exceeds limit. 文件超过上传限制， 无法进行。 " );
		     return false;;
		 }
		 // Special handling mp3 audio. Will only pass the fileName and the file. No other fields will pass.
		 if ( formName == "ENMessageAudioForm" && htmlFiles[0].size >= uploadHardLimit){
			 console.log("Special handling English audioFile upload.")
			//streamPost(formName, "ajaxFormHandler.php", document.getElementById("messageAudioFileName2").value, htmlFiles[0], $(formToProgressControls[formName][1])[0] ); // jquery $ return array!
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
             if ( formToProgressControls[formName] && formToProgressControls[formName][1] ) {
                    dbg("Successfully processed form! formName:" + formName + " :has :" + formToProgressControls[formName][1] );
             }

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
					 $(formToProgressControls[formName][1]).text("uploaded: "+  percent + "% of " + (evt.total/(1024*1024)).toFixed(2) + "MB ");
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
				 fd.append("formType", "ENChunkPostForm"); // used to route handler.

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
		 function streamPost(formType, handler, serverFileName, fileField, progressControl ){
			 var postUrl = handler + encodeURIComponent("?saveFileName="+serverFileName);
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


	     // fill the field with value we should know.
	     var today = new Date();
	     // 信息日期: format: "yy-mm-dd" yy in jquery UI MEANS 4 digitals, NOT 2 digitals. It's first part of ISO date!
	     var isoDate = today.toISOString().split('T')[0];
	     $("#messageDate").val(isoDate);
	     $("#musicDate").val(isoDate);
	     $("#messagePdfFileName").val(getFileName(today,"messagePdf" ));
// $("#messageSpeaker").val("李紹沅牧師" ); // Change this if we change pastor.
	     $("#messageAudioFileName1").val(getFileName(today,"messageAudioMp3"));
	     $("#messageAudioFileName2").val(getFileName(today,"messageAudioMp3"));
	     $("#musicAudioFileName").val(getFileName(today,"hymnAudioMp3"));
	    </script>
    </body>
</html>
