<?php
function openDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
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
    $sql = $db->prepare("SELECT * FROM intranettable");
    $sql->execute();
    $resultQuery = $sql->get_result();
    while ($row = mysqli_fetch_assoc($resultQuery)) {
        echo "<div class='contactinfo'>" .
            "<p class='name'>" . $row["nom"] . " " . $row["prenom"] . "</p>" .
            "<p class='mail'>" . $row["mail"] . "</p>" .
            "<p class='tel'>" . $row["tel"] . "</p>" . 
            "<form method='POST' action='deleteUser.php'>" . 
                "<button class='delete' name='delete' value='" . $row["id"] . "'>Delete</button>" .
            "</form>" .     
            
            "</div>";
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
            "<p class='creationDate'> Créé le : <br>" . $row["CreationDate"] . "</p>" .
            "<p class='author'> Par : <br>" . $row["Author"] . "</div>";
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

function deleteContact(int $id) {
    $db = openDB();
    $sql = $db->prepare("DELETE FROM intranettable WHERE id = ?");
    $sql->execute([$id]);
}


?>