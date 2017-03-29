<?php 
if(empty($_FILES['file']))
{
	exit();	
}
$errorImgFile = "./img/img_upload_error.jpg";
$destinationFilePath = './storage/article/'.date('now').'-'.$_FILES['file']['name'];
if(!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)){
	echo $errorImgFile;
}
else{
	echo "http://localhost:8000/storage/article/".date('now').'-'.$_FILES['file']['name'];
}

?>