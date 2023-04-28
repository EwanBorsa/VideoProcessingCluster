<?php

class VideoProcessingModel
{
    private const HEADER_SIGNATURE_LENGTH = 12;# 12B => Max bytes for check the signature.
    private const MAX_FILE_SIZE = 500000000;# 500MB => Max of file size is 500 MegaBytes.
    private array $formats;

    public function __construct()
    {
        $this->formats = $this->getFormatList();

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



}