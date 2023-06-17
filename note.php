<?php
require_once "request.php" ;
session_start();
?>
<?php function addNote(){
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
    <link rel="stylesheet" href="assets/note.css">
    <title>Intranet</title>
</head>

<body>

    <header>
        <?php include "header.php" ?>
    </header>
    
    <form method="POST" class="addingform">
        <input type="hidden" id="auteurInput" name="auteurInput" value="<?php echo $_SESSION['nom'] ?>">
        <label> Note : </label> <textarea class="addinput" id="noteInput" name="noteInput" rows="10" cols="50"></textarea><br>
        <label> Acces : </label> <span class="bottom"><input class="addinput" type="text" id="accesInput" name="accesInput">
        <input class="submitButton" type="submit" value="Submit"></span>
    </form>
    <?php addNote(); ?>

</body>

</html>