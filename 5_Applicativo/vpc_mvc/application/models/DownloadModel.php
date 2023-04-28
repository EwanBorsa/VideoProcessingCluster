<?php

class DownloadModel
{
    private $sessId;
    private $dbConn;

    /**
     * @param $id
     */
    public function __construct($dbConn, $sessId)
    {
        $this->sessId = $sessId;
        $this->dbConn = $dbConn;
    }

    public function downloadFile(): void
    {
        //$path = $this->dbConn->getPath($this->sessId);
        //$this->downloadFile($path);
    }

}