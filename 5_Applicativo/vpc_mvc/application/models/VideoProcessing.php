<?php

class VideoProcessing
{
    const HEADER_SIGNATURE_LENGTH = 12;# 12B => Max bytes for check the signature.
    const MAX_FILE_SIZE = 500000000;# 500MB => Max of file size is 500 MegaBytes.

    function checkVideo(){
        $vFile = $_FILES["file"];
        if ($vFile["error"] > 0) {
            header("Location: error.php");
            echo "Error: " . $vFile["error"];
            die();
        } else {
            if(filesize($vFile) > $this->MAX_FILE_SIZE){
                $formatList = getFormatList();
                $handle = fopen($vFile, "rb");# Read Binary.
                $header = fread($handle, $this->HEADER_SIGNATURE_LENGTH);
                fclose($handle);
                if(checkFormat($header) != -1){
                    return true;
                }
            }
            return true;
        }
    }

    function checkFormat($header){
        $formats = getFormatList();
        foreach ($formats as $format) {
            $signatureLength = (strlen($format["signature"])+1)/3;//Number of bytes in the signature. ex:"35 A7 8B"=>3
            if($format["signature"] == substr($header, $format["offset"], $signatureLength)){
                return $format["id"];
            }
        }
        return -1;
    }

    function getFormatList(): array
    {
        $formatList = [];

        $conn = new mysqli('localhost', 'root', 'root', 'vpc');

        $query = "SELECT 'id', 'name', 'extension', 'signature', 'offset' FROM format";

        $result = $conn->query($query);

        $formatList = $result->fetch_all(MYSQLI_ASSOC);

        $result->free();

        return $formatList;
    }

}