<?php


class Home
{

    private UploadModel $uploader;
    private VideoProcessingModel $processor;
    private DownloadModel $downloader;
    private DatabaseModel $dbConn;
    private string $sessId;

    public function __construct()
    {
        //require "application/models/DatabaseModel.php";
        //$this->databaseModel = new DatabaseModel();

        require 'application/models/UploadModel.php';
        $this->uploader = new UploadModel($this->dbConn ?? null);
        $this->sessId = $this->uploader->getSessId();
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
            $filePath = $this->dbConn->getPath($this->sessId);
            require 'application/models/VideoProcessingModel.php';
            $this->processor = new VideoProcessingModel($this->databaseModel ?? null, $filePath);
            $this->processor->checkVideo($filePath);


            require 'application/models/DownloadModel.php';
            $this->downloader = new DownloadModel($this->dbConn, $this->sessId);
        }else{
            require_once 'application/views/upload/error.php';
        }

    }

    public function download() : void
    {
        require 'application/models/DownloadModel.php';
        $this->downloader = new DownloadModel($this->dbConn, $this->sessId);
        require 'application/models/VideoProcessingModel.php';
        $this->processor = new VideoProcessingModel($this->dbConn, $this->sessId);
        $iFrameStat = $this->processor->getIFrameStat();
        $bFrameStat = $this->processor->getBFrameStat();
        $pFrameStat = $this->processor->getPFrameStat();
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