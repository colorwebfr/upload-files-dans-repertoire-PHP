<?php
     $target_dir = "uploads/";
     $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     $check = true;
        //Check si le fichier image exist ou est un fake.
     if(isset($_POST["submit"])){
     	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     	if(check != false){
     		echo "Ce fichier est une image-".$check["mime"].".";
     		$uploadOk = 1;
     	}else{
     		echo "Ce fichier n'est pas une image.";
     		$uploadOk = 0;
     	}
     }
     // Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}











//$ target_dir = "uploads /" - spécifie le répertoire où le fichier va être placé

//$ target_file spécifie le chemin du fichier à télécharger

//$ uploadOk = 1 n'est pas encore utilisé (sera utilisé plus tard)

//$ imageFileType contient l'extension de fichier du fichier (en minuscules)

//Ensuite, vérifiez si le fichier image est une image réelle ou une fausse image
?>