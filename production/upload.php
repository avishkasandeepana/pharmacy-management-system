<?php
$target_dir="uploads/";
$target_file = $target_dir . basename($_FILES["fileTOUpload"]["name"]);
$uploadok=1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// check if image file is actual image or fake image
if(isset($_POST["submit"])){
    $check=getimagesize($_FILES["fileToUpload"]["ymp_name"]);
    if($check !==false){
        echo "file is an image " . $check["mime"] .".";
        $uploadok = 1;

    }else{
        echo "file is not an image";
        $uploadOk=0;
    }
}

// check if already exists
if (file_exists($target_file)){
    echo "sorry,file already exists";
    $$uploadok = 0;
}
// check file size

if($_FILES["fileToUpload"]["size"]>500000){
    echo "sorry file is too large";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType !="jpg" && $$imageFileType !="png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
    echo "sorry only jpg,jpeg,gif,png. files are allowed.";
    $uploadOk = 0;
}
// check $upload is set to 0 by an error
if($uploadOk == 0){
    echo "sorry, your files not upload.";
} else{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
        echo "the file" . htmlspecialchars(basename(
            $_FILES["fileToUpload"]["name"]
        )). "has been uploaded.";
    }else{
        echo "sorry there was an error uploding your file.";
    }
}

?>