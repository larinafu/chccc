<?php include "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?>	
<?php
$group_id =  $_POST["gid"];
$photo_id =  $_POST["pid"];
$command = $_POST["command"];

if (!empty($command)){
	$group_id =  $_POST["group_id"];
	//delete photo
	$db = new PDO('mysql:host='.$db_host.';dbname='.$database,
		    $username,
		    $password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
     $db->query("DELETE FROM ch_group_photo WHERE photo_id = $photo_id");
     echo "deleted successfully. <a href='GroupPhotoList.php?id=$group_id' >Back to List</a>" ;
     
     //delete the physical file?
     
}  else {
	//upload photo

$allowedExts = array("gif", "jpeg", "jpg");
$extension = end(explode(".", $_FILES["file"]["name"]));

$max_photo_file_size = 8000000;

if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	and ($_FILES["file"]["size"] < $max_photo_file_size)
 	and in_array($extension, $allowedExts)))
{
	if ($_FILES["file"]["error"] > 0)
    {
    	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  	else
    {
		$group_image_folder = $_SERVER[DOCUMENT_ROOT]. "/images/group/". $group_id;
		
		if (!file_exists($group_image_folder)) 
		{
			mkdir($group_image_folder);
		}
		
    	if (file_exists($group_image_folder . "/" . $_FILES["file"]["name"]))
      	{
      		echo $_FILES["file"]["name"] . " already exists. ";
      	}
    	else
      	{
      		move_uploaded_file($_FILES["file"]["tmp_name"], 
      			$group_image_folder . "/". $_FILES["file"]["name"]);
      		
      		addGroupPhoto($_POST["gid"], $_FILES["file"]["name"],  $_POST["photo_description"],  $_POST["photo_description_en"]);
      		//header("Location: GroupPhotoList.php?id=$group_id");
      		echo "uploaded successfully. <a href='GroupPhotoList.php?id=$group_id' >Back to List</a>" ;
      	}
    }
}
else
{
	echo "Invalid file";
}

}


function addGroupPhoto($gid, $photo_name, $photo_desc, $photo_desc_en){
    	$db = new PDO('mysql:host='.$db_host.';dbname='.$database,
		    $username,
		    $password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    
    $db->query("INSERT INTO ch_group_photo " .
				"	(photo_path, photo_description, photo_description_en, group_id) " .
				"	VALUES " .
				"	('$photo_name', '$photo_desc', '$photo_desc_en', '$gid')");	
}
?>