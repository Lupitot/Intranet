<?php
function openDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "raspberry";
    $dbname = "intranet";

    try {
        $con = new mysqli($servername, $username, $password, $dbname);
    } catch (Exception $e) {
        die("couldn't connect to DB: " . $e->getMessage());
    }

    return $con;
}
function generateContactInfo()
{
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

function generateEvent()
{
    $db = openDB();
    $sql = $db->prepare("SELECT * FROM agenda_event");
    $sql->execute();
    $resultQuery = $sql->get_result();
    while ($row = mysqli_fetch_assoc($resultQuery)) {
        echo "<div class='event'>" .
            "<p class='date'>" . $row["Date"] . "</p>" .
            "<p class='title'>" . $row["NameOfEvent"] . "</p>" .
            "<p class='creationDate'>" . $row["CreationDate"] . "</p>" .
            "<p class='author'>" . $row["Author"] . "</div>";
    }
}

function generatePersonalNote($Author)
{

    $db = openDB();
    $sql = $db->prepare("SELECT * FROM note WHERE auteur = ?");
    $sql->bind_param("s", $Author);
    $sql->execute();
    $resultQuery = $sql->get_result();
    while ($row = mysqli_fetch_assoc($resultQuery)) {
        echo "<div class='note'>" .
            "<p class='textNote'>" . $row["note"] . "</p>" . "</div>";
    }
}
?>