<?php 
if(!isset($_GET["session_id"]) or empty($_GET["session_id"])){
    $_GET["session_id"] = random_int(100000000, 999999999);
}
$ds = DIRECTORY_SEPARATOR;
$storeFolder = '..' . $ds . 'uploads' . $ds;
uploadFile();
$directory = $_GET["session_id"];#12345678; #$_GET["session_id"];
function uploadFile(){
    $session_id = $_GET["session_id"];
    $directory = "/../uploads/" . $session_id ."/";#12345678; #$_GET["session_id"];
    $sessione = $directory;
    shell_exec("../ffmpeg/create_directories.sh $session_id");
    #echo "uploading<br>";
    #echo $directory . "<br>";
    $fileDaPassare = "";
    #print_r($_FILES);
    #echo "<br>";
    if(isset($_FILES['user_file'])){
        $tempFile = $_FILES['user_file']['tmp_name'];
        $fileDaPassare = $_FILES['user_file']['name'];
        $targetPath = dirname( __FILE__ ) . $storeFolder . $directory . $ds;
        $targetFile =  $targetPath . basename($_FILES['user_file']['name']);
        #echo $targetFile . "<br>";
        if (move_uploaded_file($tempFile, $targetFile)) {
            //echo "Il file " . basename($_FILES["user_file"]["name"]) . " è stato caricato con successo.";
            generateVideosAndFrames($fileDaPassare);
        } else {
            echo "Si è verificato un errore durante il caricamento del file.";
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
    
    
}

function generateVideosAndFrames($fileName){
    if(isset($fileName)){
        
        $sessione = $_GET["session_id"];
        $splittedName = explode(".", $fileName);
        $videoBase = "../uploads/" . $sessione . "/" . $fileName;
        $dirBase = "../uploads/" . $sessione . "/";
        if(count($splittedName) > 1){
            $dimensione = count($splittedName) - 2;
            $iVideo = "";
            $pVideo = "";
            $bVideo = "";
            $mvVideo = "";
            for($i = 0; $i < count($splittedName); $i++){
                if($i == $dimensione){
                    $iVideo = $iVideo . $splittedName[$i] . "_I.";
                    $bVideo = $bVideo . $splittedName[$i] . "_B.";
                    $pVideo = $pVideo . $splittedName[$i] . "_P.";
                    $mvVideo = $mvVideo . $splittedName[$i] . "_MotionVector.";
                }else{
                    $iVideo = $iVideo . $splittedName[$i];
                    $bVideo = $bVideo . $splittedName[$i];
                    $pVideo = $pVideo . $splittedName[$i];
                    $mvVideo = $mvVideo . $splittedName[$i];
                }
                
            }
            $dirI = $dirBase . $iVideo;
            $dirB = $dirBase . $bVideo;
            $dirP = $dirBase . $pVideo;
            $dirMV = $dirBase . $mvVideo;
            $dirFramesI = $dirBase . "I_Frames";
            $dirFramesB = $dirBase . "B_Frames";
            $dirFramesP = $dirBase . "P_Frames";
            shell_exec("../ffmpeg/generate_I_video.sh $videoBase $dirI");
            shell_exec("../ffmpeg/generate_B_video.sh $videoBase $dirB");
            shell_exec("../ffmpeg/generate_P_video.sh $videoBase $dirP");
            shell_exec("../ffmpeg/generate_I_frames.sh $videoBase $dirFramesI");
            shell_exec("../ffmpeg/generate_B_frames.sh $videoBase $dirFramesB");
            shell_exec("../ffmpeg/generate_P_frames.sh $videoBase $dirFramesP");
            shell_exec("../ffmpeg/generate_motion_vector_video.sh $videoBase $dirMV");
            $dirFramesI = $dirFramesI . "/";
            $dirFramesB = $dirFramesB . "/";
            $dirFramesP = $dirFramesP . "/";
            $conn = mysqli_connect("192.168.56.40", "vpcAdmin", "fgxDDFdxvjz__t6r78fo786");
            // echo "connected"."<br>";
            mysqli_select_db($conn, "vpc");
            // echo "db selected"."<br>";
            $query = "INSERT INTO videoSessionPath 
            (sessionID, pathBasicVideo, pathIVideo, pathBVideo, pathPVideo, pathMVVideo, pathIFrames, pathBFrames, pathPFrames) 
            VALUES ($sessione, '$videoBase', '$dirI', '$dirB', '$dirP', '$dirMV', '$dirFramesI', '$dirFramesB', '$dirFramesP')";
            // echo "inserting: ".$query."<br>";
            $result = mysqli_query($conn, $query);
            // echo "insert done ".$result;
        }
    }else{
        echo "NON FUNZIONA (NOME FILE)";
    }
    
}
/*$conn2 = mysqli_connect("192.168.56.40", "vpcAdmin", "fgxDDFdxvjz__t6r78fo786");
mysqli_select_db($conn2, "vpc");
$sumResults = 0;
$resultI = 0;
$resultB = 0;
$resultP = 0;
$queryNum = "SELECT pathBasicVideo FROM videoSessionPath WHERE sessionID LIKE '$directory'";
$video = mysqli_query($conn2, $queryNum);
$commandI = "ffmpeg -i $video -vf 'select=\"eq(pict_type\,I)\"' -vsync 0 -f null - 2>&1 | grep 'frame=' | wc -l";
$resultI = exec($commandI);
$commandB = "ffmpeg -i $video -vf 'select=\"eq(pict_type\,B)\"' -vsync 0 -f null - 2>&1 | grep 'frame=' | wc -l";
$resultB = exec($commandB);
$commandP = "ffmpeg -i $video -vf 'select=\"eq(pict_type\,P)\"' -vsync 0 -f null - 2>&1 | grep 'frame=' | wc -l";
$resultP = exec($commandP);
$sumResults = $resultI + $resultB + $resultP;
$percI = $sumResults / 100 * $resultI;
$percB = $sumResults / 100 * $resultB;
$percP = $sumResults / 100 * $resultP;
$statsI = $resultI . " - " . $percI . "%";
$statsB = $resultB . " - " . $percB . "%";
$statsP = $resultP . " - " . $percP . "%";
$queryI = "SELECT pathIVideo FROM videoSessionPath WHERE sessionID LIKE '$directory'";
$queryB = "SELECT pathBVideo FROM videoSessionPath WHERE sessionID LIKE '$directory'";
$queryP = "SELECT pathPVideo FROM videoSessionPath WHERE sessionID LIKE '$directory'";
$queryMV = "SELECT pathMVVideo FROM videoSessionPath WHERE sessionID LIKE '$directory'";
$pathI = "";
$pathB = "";
$pathP = "";
$pathMV = "";
$pathI = mysqli_query($conn2, $queryI);
$pathB = mysqli_query($conn2, $queryB);
$pathP = mysqli_query($conn2, $queryP);
$pathMV = mysqli_query($conn2, $queryMV);*/
require 'videoprocessing.php';
?>