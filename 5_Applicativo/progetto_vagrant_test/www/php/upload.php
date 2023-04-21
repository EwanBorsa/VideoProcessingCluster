<!DOCTYPE html>
<html>
<head>
	<title>Video Processing Cluster</title>

	<meta charset= "UTF-8">
	<meta name= "description" content= "Questa è la upload page del progetto Video Proccessing Cluster">
	<meta name= "keywords" content= "upload, video, proccessing, cluster.">
	<meta name= "author" content= "ewan.borsa; matteo.ruedi; alessandro.castelli.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" type="image/x-icon" href="../images/upload.ico">
	<link rel="stylesheet" href="../css/basic.css">
	<link rel="stylesheet" href="../css/upload.css">
	<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    
	<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</head>
<body>
<form action="./videoprocessing.php" id="uploadform" class="dropzone" method="post">
    <h1>Video Processing Cluster</h1><br>
	<div class="rect-upload">
		<img src="../images/upload.png" alt="UPLOAD_VIDEO_PNG" width="100" style="margin:10px"></img>
		<div class="text">Carica il video con un clic sullo schermo</div>
		<br><hr><div class="altrimenti">OPPURE</div><hr><br>
		<div class="text">Trascina e rilascia qui il file</div><br>
		<div class="formati-file"><a href="../php/formats.php" target="_blank">Formati file supportati</a><br>Max. 500MB</div> 
	</div>
	<br>
	<input class="" type="submit">
	<br><br>
	<div class="rect-id">
		<b>Se hai già fatto l'upload del video puoi accedere tramite l'id di sessione:</b><br><br>
		<input type="number" name="session_id" class="session-id"></input>
	</div>	
</form>
<form method="post" action="generate.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload" />
            <label>Carica il tuo file:</label>
            <input type="file" name="user_file" />
            <br />
            <input type="submit" value="Carica online" />
        </form>
</body> 
</html>


<?php
_log("debug", "upload.php file opened");

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
?>   