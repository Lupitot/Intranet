<?php
require_once "request.php";
session_start();
?>
<?php function addNote()
{
    $db = openDB();
    if (isset($_POST["noteInput"]) && isset($_POST["accesInput"]) && isset($_POST["auteurInput"])) {
        $auteur = strip_tags($_POST["auteurInput"]);
        $note = strip_tags($_POST["noteInput"]);
        $acces = strip_tags($_POST["accesInput"]);
        $stmt = $db->prepare("INSERT INTO note (auteur, note, acces) VALUES (?,?,?)");
        $stmt->bind_param("sss", $auteur, $note, $acces);
        $stmt->execute();
    } else {

    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/showingNote.css">
    <title>Intranet</title>
</head>

<body>

    <header>
        <?php include "header.php" ?>
    </header>

    <div class="contentNote">
        <?php generatePersonalNote($_SESSION['nom']); ?>    
    </div>

    <a href="note.php" class="btn">Create Note</a>

</body>

</html>