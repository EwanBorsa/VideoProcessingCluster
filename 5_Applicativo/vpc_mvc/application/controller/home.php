<?php


class Home
{
    private Upload $uploader;
    private VideoProcessing $processor;
    private Download $downloader;

    public function __construct(){
        require 'application/models/Upload.php';
        $this->uploader = new Upload();
        require 'application/models/Download.php';
        $this->downloader = new Download();
        require 'application/models/VideoProcessing.php';
        $this->processor = new VideoProcessing();
    }

    public function index() : void
    {
        require_once 'application/views/_templates/header.php';
        require_once 'application/views/upload/index.php';
        require_once 'application/views/_templates/footer.php';
        $this->uploader->uploadFile();
    }

    public function formatsList(): void
    {
        require_once 'application/views/_templates/header.php';
        require_once 'application/views/upload/formats.php';
        require_once 'application/views/_templates/footer.php';
    }
}
