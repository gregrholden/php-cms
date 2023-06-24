<?php

// Base host is "localhost". This sets the base relative path within localhost.
$ROOT = __DIR__;
// From XAMPP on Windows.
// Base URL by default is 'C:\xampp\htdocs\cosc630'
//                  Index: 0    1      2      3
if (strtolower(substr($ROOT, 0, 1)) == "c") {
    $BASE_ARR = explode('\\', $ROOT);
    $BASE_URL = '/' . $BASE_ARR[3] . '/';
}
// From WSL/Linux.
// Base URL by default is '/var/www/html/webProg1/COSC630'
//                Index:  0  1   2   3      4       5
else {
    $BASE_ARR = explode('/', $ROOT);
    $BASE_URL = '/' . implode('/', array($BASE_ARR[4], $BASE_ARR[5])) . '/';
}

?>
