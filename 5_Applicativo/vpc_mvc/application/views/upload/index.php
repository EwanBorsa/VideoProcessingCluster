<h1>Upload</h1>
<form action="<?php echo URL?>\home\" id="uploadform" class="dropzone" method="get">
    <br>
    <div id="uploadCenter" class="rect-upload">
        <img src="application\views\_assets\upload.png" alt="ERR_UPLOAD_VIDEO_PNG" width="100px" style="margin:10px">
        <div class="text">Carica il video con un clic sullo schermo</div>
        <br>
        <hr><div class="altrimenti">OPPURE</div><hr>
        <br>
        <div class="text">Trascina e rilascia qui il file</div>
        <br>
        <div class="formati-file">
            <a href="<?php echo URL?>\home\formatsList" target="_blank">Formati file supportati</a>
            <br>
            Max. 500MB
        </div>
    </div>
    <br>
    <div class="rect-id">
        <label class="sessId"><?php echo $sessionId ?? "ERRORE CREAZIONE ID SESSIONE" ?></php></label>
    </div>
    <br>
    <input class="" type="submit">
</form>
<script>
    Dropzone.options.myGreatDropzone = { // camelized version of the `id`
        paramName: "video", // The name that will be used to transfer the file
        maxFilesize: 500, // MB
        maxFiles: 1,
        disablePreviews: true;
    };
</script>