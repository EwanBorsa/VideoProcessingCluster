<?php

class DatabaseModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli('localhost', USERNAME, PASSWORD, DATABASE, PORT);
    }

    public function insertPath($sessId, $path)
    {
        $query = "INSERT INTO videoSessionPath(sessionId, sessionPath) VALUES(".$sessId.",".$path.")";
        return $this->connection->query($query);
    }

    public function getPath()
    {
        $selectFaq = "SELECT path FROM videoSessionPath WHERE sessionId = ".$this->sessId;
        return $this->connection->query($selectFaq);
    }

    function getFormatList(): array
    {
        $conn = new mysqli('localhost', 'root', 'root', 'vpc');

        $query = "SELECT 'id', 'name', 'extension', 'signature', 'offset' FROM format";

        $result = $conn->query($query);

        $formatList = $result->fetch_all(MYSQLI_ASSOC);

        $result->free();

        return $formatList;
    }
}