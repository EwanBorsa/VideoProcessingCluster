<?php

class DatabaseModel
{

    //private $memcache;
    private $connection;

    public function __construct()
    {
        //$this->memcache = new Memcache();
        //$this->memcache->addServer(HOST, 11211);

        $this->connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE, PORT);
    }

    public function insertPath($sessId, $path)
    {
        //$this->memcache->set($sessId, $path);

        $query = "INSERT INTO videoSessionPath(sessionId, sessionPath) VALUES(".$sessId.",".$path.")";

        return $this->connection->query($query);
    }

    public function getPath($sessId)
    {
        //$result = $this->memcache->get($sessId);

        $query = "SELECT path FROM videoSessionPath WHERE sessionId = ".$sessId;

        $result = $this->connection->query($query);

        var_dump($query);

        return $result;
    }

    function getFormatList(): array
    {
        $query = "SELECT id, name, extension, signature, offset FROM format";

        $result = $this->connection->query($query);

        $formatList = $result->fetch_all(MYSQLI_ASSOC);

        $result->free();

        return $formatList;
    }
}

$db = new DatabaseModel();
