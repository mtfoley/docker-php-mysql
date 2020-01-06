<?php

function mlink($h,$u,$pw,$d,$p=3306){
    $link = mysqli_connect($h,$u,$pw,$d);
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit();
    }
    echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
    mysqli_close($link);
}

$link1 = mlink("db", "bloguser", "hg567", "blogsite",3306);


?>