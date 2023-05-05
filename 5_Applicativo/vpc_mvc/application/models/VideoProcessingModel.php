<?php

class VideoProcessingModel
{
    const HEADER_SIGNATURE_LENGTH = 12;# 12B => Max bytes for check the signature.
    const MAX_FILE_SIZE = 500000000;# 500MB => Max of file size is 500 MegaBytes.
    private array $formats;
    private $path;
    private $dbConn;

    public function __construct($dbConn, $path)
    {
        $this->dbConn = $dbConn;
        $this->path = $path;
        //$this->formats = $this->dbConn->getFormatList();
        $this->process();
    }

    function checkVideo($path): bool
    {
        if(file_exists($path)){
            $file = basename($path);
            if(filesize($file) > $this->MAX_FILE_SIZE){
                $handle = fopen($file, "rb");# Read Binary.
                $header = fread($handle, $this->HEADER_SIGNATURE_LENGTH);
                fclose($handle);
                if($this->checkFormat($header) != -1){
                    return true;
                }
            }
        }
        return false;
    }

    function checkFormat($header){
        foreach ($this->formats as $format) {
            $signatureLength = (strlen($format["signature"])+1)/3;//Number of bytes in the signature. ex:"35 A7 8B"=>3
            if($format["signature"] == substr($header, $format["offset"], $signatureLength)){
                return $format["id"];
            }
        }
        return -1;
    }

    public function getTotFrame(): int
    {
        return 0;
    }

    public function getFrameStat($type): string
    {
        $frames = 0;
        return $frames*100/$this->getTotFrame() . "%<br>nr." . $frames;
    }

    public function countFiles(): int
    {
        return 0;
    }

    public function process(): void
    {
        $srcDest =  " " . $this->path . " " . $this->path;
        shell_exec(URL . "/scripts/generate_B_frames.sh" . $srcDest);
        shell_exec(URL . "/scripts/generate_P_frames.sh " . $srcDest);
        shell_exec(URL . "/scripts/generate_I_frames.sh " . $srcDest);
        shell_exec(URL . "/scripts/generate_B_video.sh " . $srcDest . "_VideoB");
        shell_exec(URL . "/scripts/generate_P_video.sh "  . $srcDest . "_VideoP");
        shell_exec(URL . "/scripts/generate_I_video.sh "  . $srcDest . "_VideoI");
        shell_exec(URL . "/scripts/generate_motion_vector_video.sh " . $srcDest . "_VideoB");
    }

}