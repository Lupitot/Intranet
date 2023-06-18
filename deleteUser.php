<?php
require_once "request.php";
session_start();

    $db = openDB();
    $id = $_POST['delete'];
    $stmt = $db->prepare("DELETE FROM intranettable WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    if($stmt->errno) {
        echo "FAILURE!!! " . $stmt->error;
    }
    else {
        header("Location: contact.php");
    }
?>