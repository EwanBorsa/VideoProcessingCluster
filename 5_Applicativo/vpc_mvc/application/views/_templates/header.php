<!DOCTYPE html>
<html>
<head>
    <title>Video Processing Cluster</title>
    <meta charset= "UTF-8">
    <meta name= "description" content= "Questa è la upload page del progetto Video Proccessing Cluster">
    <meta name= "keywords" content= "upload, video, proccessing, cluster.">
    <meta name= "author" content= "ewan.borsa; matteo.ruedi; alessandro.castelli;">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="application\views\_assets\processing.ico" >
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="application\views\_css\default.css" type="text/css" >
    <link rel="stylesheet" href="application\views\_css\upload.css" type="text/css" >
    <link rel="stylesheet" href="application\views\_css\download.css" type="text/css" >
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myGreatDropzone = { // camelized version of the `id`
            paramName: "video", // The name that will be used to transfer the file
            maxFilesize: 500, // MB
            maxFiles: 1,
            disablePreviews: true;
        };
    </script>
</head>
<body>