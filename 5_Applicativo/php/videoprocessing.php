<?php 
print_r("<div style='text-align: center'>Id Sessione:" . $_GET["session_id"] . "</div>");
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../css/processingVideo.css">
    </head>
    <body>
        <h1 >Video Processing Cluster</h1>
        <div class="divVideo">
            <video controls class="video">
                <!--<source src="video.mp4" type="video/mp4">-->
            </video>
        </div>
        <div class="divButton">
            <button id="button1">Scarica video con i motion vector</button>
            <br>
            <br>
            <br>
            <button id="button2">Scarica video con i frame selezionati</button>
            <br>
            <br>
            <!--<select id="framesVideo" name="framesVideo">
                <option value="I">I</option>
                <option value="B">B</option>
                <option value="P">P</option>
            </select>-->
            <form class="check1">
                <input type="checkbox" id="framesVideoI" name="framesVideoI" value="I">
                <label for="vehicle1"> I </label>
                <input type="checkbox" id="framesVideoB" name="framesVideoB" value="B">
                <label for="vehicle2"> B </label>
                <input type="checkbox" id="framesVideoP" name="framesVideoP" value="P">
                <label for="vehicle3"> P </label>
            </form>
            <br>
            <br>
            <button id="button2">Scarica i frame selezionati</button>
            <br>
            <br>
            <form class="check2">
                <input type="checkbox" id="framesI" name="framesI" value="I">
                <label for="vehicle1"> I </label>
                <input type="checkbox" id="framesB" name="framesVideoB" value="B">
                <label for="vehicle2"> B </label>
                <input type="checkbox" id="framesP" name="framesP" value="P">
                <label for="vehicle3"> P </label>
            </form>
        </div>
        <h3>Statistica dei frame del video</h3>
        <div class="divTable">
            <table>
                <tr>
                    <th>I frame</th>
                    <th>B Frame</th>
                    <th>P Frame</th>
                </tr>
                <tr>
                    <td>0 - 0%</td>
                    <td>0 - 0%</td>
                    <td>0 - 0%</td>
                </tr>
            </table>
        </div>  
        <h3>Grafico dei frame del video</h3>


    </body>
</html>

<?php
_log("debug", "upload.php file opened");
uploadFile();
echo "<script type='text/javascript'> 
                window.onload=function(){
                    document.forms['uploadform'].submit();
                }
       </script>";

function uploadFile(){
    if (!empty($_FILES)) {//se ci sono files...
        $ds = DIRECTORY_SEPARATOR;
        $storeFolder = $ds . '..' . $ds . 'uploads' . $ds;
        $tempFile = $_FILES['file']['tmp_name'];  
        if(check($tempFile)){
    
        }
        $targetPath = dirname( __FILE__ ) . $storeFolder . $_GET["session_id"] . $ds;
        $targetFile =  $targetPath . $_FILES['file']['name'];
        move_uploaded_file($tempFile,$targetFile);
    }
}
function _log($type, $text) {
	$ds = DIRECTORY_SEPARATOR;
	$path = dirname( __FILE__ ) . $ds . ".." . $ds . "logs" . $ds;
	$now = date("Y/m/d H:i:s");
	$message = $now . " - " . $text;
	switch($type){
		case "error":
			openlog($path . "errors.log", LOG_PID | LOG_PERROR, LOG_SYSLOG);
			syslog(LOG_ERR, $message);
			break;
		case "info":
			openlog($path . "info.log", LOG_PID | LOG_PERROR, LOG_SYSLOG);
			syslog(LOG_INFO, $message);
			break;
		case "debug":
			openlog($path . "debug.log", LOG_PID | LOG_PERROR, LOG_SYSLOG);
			syslog(LOG_DEBUG, $message);
			break;
		default:
			openlog($path . "extra.log", LOG_PID | LOG_PERROR | LOG_CONS | LOG_NDELAY | LOG_ODELAY, LOG_SYSLOG);
			syslog(LOG_ERR, $message);
			break;
	}
	closelog();
}
function check($files){
    // Check if file already exists
    if (file_exists($file)) {
        echo "Sorry, file already exists(upload a new file).";
        return false;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large(max: 500MB).";
        return false;
    }
    // Allow certain file formats
    if($fileType != "") {
        echo "Sorry, only videos files are allowed(see formats list).";
        return false;
    }
    return true;
}
?>