<?php
session_start();
$_SESSION["session_id"] = random_int(10000000, 99999999);
print_r("Id Sessione: " . $_SESSION["session_id"]);
readfile("./html/upload.html");
?>