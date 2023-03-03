<?php
session_start();
$_SESSION["session_id"] = random_int(100000000, 999999999);
print_r("Id Sessione: " . $_SESSION["session_id"]);
readfile("../html/upload.html");
include "upload.php";
?>