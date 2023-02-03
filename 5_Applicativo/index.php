<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index-upload.css">
    <link href="css/dropzone.css" type="text/css" rel="stylesheet" />
    <script src="dropzone.js"></script>
    <script>
        var i = 0;
        function move() {
            if (!i) {
                i = 1;
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 10);
                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                        i = 0;
                    } else {
                        width++;
                        elem.style.width = width + "%";
                    }
                }
            }
        }
    </script>
</head>
<body style="text-align: center;">
    <h1 class="video-processing">Video Processing Cluster</h1>
    
    <div class="rect-upload">
        <img src="images/upload.png" alt="UPLOAD" width="100" style="margin:10px"></img>
        <br><button class="button-upload">Carica il tuo video</button><br>
        <br><hr><div class="altrimenti">ALTRIMENTI</div><hr><br>
        <form action="upload.php" class="dropzone">
        <div class="rilascia-qui">Trascina e rilascia qui</div><br>
        <div class="formati-file">Formati file supportati: MP4, MOV, MKV, AVI, WMV, FLV, GIF<br>Max. 500MB</div>
        </form>
        
    </div>
    <br><br>
    <div class="progress-bar" id="myProgress">
        <div class="progress-bar" id="myBar"></div>
    </div>
    
    <br><br><br><br><br><br><br><br>
    <a href="https://www.flaticon.com/free-icons/video" title="video icons">Video icons created by Hilmy Abiyyu A. - Flaticon</a>
</body> 
</html>