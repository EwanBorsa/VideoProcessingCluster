<?php

class Upload
{
    private int $id;

    /**
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function uploadFile(): void
    {
        $directory = $_GET["session_id"];
        shell_exec("../ffmpeg/create_directory.sh $directory");
        if (!empty($_FILES)) {//se ci sono files...
            $ds = DIRECTORY_SEPARATOR;
            $storeFolder = $ds . '..' . $ds . 'uploads' . $ds;
            $tempFile = $_FILES['file']['tmp_name'];
            $targetPath = dirname( __FILE__ ) . $storeFolder . $_GET["session_id"] . $ds;
            $targetFile =  $targetPath . $_FILES['file']['name'];
            move_uploaded_file($tempFile,$targetFile);
        }
    }
}