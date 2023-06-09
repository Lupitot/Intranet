<?php
function openDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "intranet";

    try {
        $con = new mysqli($servername, $username, $password, $dbname);
    } catch (Exception $e){
        die("couldn't connect to DB: " . $e->getMessage());
    }

    return $con;
}
?>