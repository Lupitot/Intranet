<?php
require_once "request.php" ;
session_start();
?>
<?php function addNote(){
    $db = openDB();
    if (isset($_POST["auteurInput"])) {
        $auteur = $_SESSION["name"];
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
    <!-- <link rel="stylesheet" href="assets/menu.css"> -->
    <title>Intranet</title>
</head>

<body>

    <header>
        <?php include "header.php" ?>
    </header>
    
    <form method="POST" class="addingform">
        Note : <input class="addinput" type="text" id="noteInput" name="noteInput"><br>
        Acces : <input class="addinput" type="text" id="accesInput" name="accesInput"><br>
        <input type="submit" value="Submit">
    </form>
    <?php addNote(); ?>

</body>

</html>