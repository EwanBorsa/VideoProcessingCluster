<?php


class Home
{

    private UploadModel $uploader;
    private VideoProcessingModel $processor;
    private DownloadModel $downloader;
    private $sessId;

    public function __construct()
    {
        require 'application/models/UploadModel.php';
        $this->uploader = new UploadModel();
        $this->sessId = $this->uploader->getSessId();

        require 'application/models/DownloadModel.php';
        $this->downloader = new DownloadModel($this->sessId);

    }

    public function index() : void
    {
        $sessionId = $this->sessId;
        require_once 'application/views/_templates/header.php';
        require_once 'application/views/upload/index.php';
        require_once 'application/views/_templates/footer.php';
    }

    public function upload() : void
    {
        if($this->uploader->uploadFile()){
            require 'application/models/VideoProcessingModel.php';
            $this->processor = new VideoProcessingModel();
            $this->processor->checkVideo();
        }else{
            require_once 'application/views/upload/error.php';
        }

    }

    public function download() : void
    {
        require 'application/models/DownloadModel.php';
        $this->downloader = new DownloadModel($this->sessId);

        require_once 'application/views/_templates/header.php';
        require_once 'application/views/download/index.php';
        require_once 'application/views/_templates/footer.php';
    }

    public function formatsList(): void
    {
        require_once 'application/views/_templates/header.php';
        require_once 'application/views/upload/formats.php';
        require_once 'application/views/_templates/footer.php';
    }
}
