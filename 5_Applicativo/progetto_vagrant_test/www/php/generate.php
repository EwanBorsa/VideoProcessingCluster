<?php 
if(!isset($_GET["session_id"]) or empty($_GET["session_id"])){
    $_GET["session_id"] = random_int(100000000, 999999999);
}
uploadFile();
function uploadFile(){
    $directory = $_GET["session_id"];
    shell_exec("../ffmpeg/create_directory.sh $directory");
    echo "uploading";
    if (!empty($_FILES)) {//se ci sono files...
        $ds = DIRECTORY_SEPARATOR;
        $storeFolder = $ds . '..' . $ds . 'uploads' . $ds;
        $tempFile = $_FILES['file']['tmp_name'];
        $targetPath = dirname( __FILE__ ) . $storeFolder . $directory . $ds;
        $targetFile =  $targetPath . $_FILES['file']['name'];
        move_uploaded_file($tempFile,$targetFile);
    }
    /*if(isset($_POST['action']) and $_POST['action'] == 'upload')
    {
        echo "isset post ok";
        $ds = DIRECTORY_SEPARATOR;
        $storeFolder = $ds . '..' . $ds . 'uploads' . $ds;
        if(isset($_FILES['user_file']))
        {
            echo "isset file ok";
            $targetPath = dirname( __FILE__ ) . $storeFolder . $_GET["session_id"] . $ds;
            $targetFile =  $targetPath . $_FILES['user_file']['tmp_name'];
            $file = $_FILES['user_file'];
            if($file['error'] == UPLOAD_ERR_OK and is_uploaded_file($file['tmp_name']))
            {
                echo "no error";
                move_uploaded_file($file['tmp_name'], $targetFile);
            }
        }
    }*/
}
require 'videoprocessing.php';
?>