<?php

class UploadModel
{
    private $sessId;
    private $dbConn;

    public function __construct($dbConn)
    {
        $this->sessId = $this->createUUID();
        $this->dbConn = $dbConn;
    }

    public function getSessId(): string
    {
        return $this->sessId;
    }

    public function uploadFile(): bool
    {
        $directory = $this->sessId;
        shell_exec("../scripts/create_directory.sh $directory");
        if (!empty($_FILES)) {//se ci sono files...
            $ds = DIRECTORY_SEPARATOR;
            $storeFolder = $ds . '..' . $ds . 'uploads' . $ds;
            $tempFile = $_FILES['file']['tmp_name'];
            $targetPath = dirname( __FILE__ ) . $storeFolder . $_GET["session_id"] . $ds;
            $targetFile =  $targetPath . $_FILES['file']['name'];
            move_uploaded_file($tempFile,$targetFile);

            return true;
            //return $this->dbConn->insertPath($this->sessId, $targetFile);
        }
        return false;
    }

    # This small helper function generates  UUIDs.
    public function createUUID($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        try {
            $data = $data ?? random_bytes(16);
        } catch (Exception $e) {}
        assert(strlen($data) == 16);

        // Output the 32 characters UUID.
        return vsprintf('%s%s%s%s%s%s%s%s', str_split(bin2hex($data), 4));
    }
}