<?php

$ds = DIRECTORY_SEPARATOR;  

$storeFolder = '..' . $ds . 'uploads';

if (!empty($_FILES)) {
    echo "hello";
    $tempFile = $_FILES['file']['tmp_name'];         
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
     
    $targetFile =  $targetPath . $_FILES['file']['name'];
 
    move_uploaded_file($tempFile,$targetFile);

    $url='./videoprocessing.php';
    header("Location: " . $url);
    die();
}
 
function check(){
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        return false;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        return false;
    }
    // Allow certain file formats
    if($fileType != "") {
        echo "Sorry, only audio/videos files are allowed.";
        return false;
    }
    return true;
}
?>   