<h1>Upload</h1>
<form action="" id="uploadform" class="dropzone" method="get">
    <br>
    <div id="uploadCenter" class="rect-upload">
        <img src="../_assets/upload.png" alt="UPLOAD_VIDEO_PNG" width="100px" style="margin:10px">
        <div class="text">Carica il video con un clic sullo schermo</div>
        <br>
        <hr><div class="altrimenti">OPPURE</div><hr>
        <br>
        <div class="text">Trascina e rilascia qui il file</div>
        <br>
        <div class="formati-file">
            <a href="formats.php" target="_blank">Formati file supportati</a>
            <br>
            Max. 500MB
        </div>
    </div>
    <br><br>
    <div class="rect-id">
        <label>
            Se hai già fatto l'upload del video puoi accedere tramite l'id di sessione:
            <input type="number" name="session_id" class="session-id">
        </label>
    </div>
    <br>
    <input class="" type="submit">
</form>
<script>
    Dropzone.options.myGreatDropzone = { // camelized version of the `id`
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 500, // MB
        maxFiles: 1,
        accept: true;
    };
</script>