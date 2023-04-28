<?php

class DownloadModel
{
    private $sessId;
    private $dbConn;

    /**
     * @param $id
     */
    public function __construct($id)
    {
        $this->sessId = $id;
        //$this->dbConn = new mysqli('localhost', USERNAME, PASSWORD, DATABASE, PORT);
    }

    public function downloadFile(): void
    {
        $path = $this->dbConn->getPath($this->sessId);
        $this->downloadFile($path);
    }

}