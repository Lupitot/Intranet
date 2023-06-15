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
function generateContactInfo() {
    $db = openDB();
    $sql = $db->prepare("SELECT nom, prenom, mail, tel FROM intranettable");
    $sql->execute();
    $resultQuery = $sql->get_result();
    while ($row = mysqli_fetch_assoc($resultQuery)) {    
        echo "<div class='contactinfo'>" .
            "<p class='name'>" . $row["nom"] . " " . $row["prenom"] . "</p>" .
            "<p class='mail'>" . $row["mail"] . "</p>" .
            "<p class='tel'>" . $row["tel"] . "</p></div>";
    }
}           
?>