<?php
require_once "request.php";
session_start()
    ?>
<?php function addContact()
{
    $db = openDB();
    if (isset($_POST["nameInput"])) {
        $lastname = strip_tags($_POST["lastnameInput"]);
        $name = strip_tags($_POST["nameInput"]);
        $mail = strip_tags($_POST["mailInput"]);
        $tel = strip_tags($_POST["telInput"]);
        $grade = strip_tags($_POST["gradeInput"]);
        $mdp = strip_tags($_POST["mdpInput"]);
        $stmt = $db->prepare("INSERT INTO intranettable (nom, prenom, mail, tel, grade, MDP) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $name, $lastname, $mail, $tel, $grade, $mdp);
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
    <link rel="stylesheet" href="assets/newcontact.css">
    <title>Intranet</title>
</head>

<body>

    <header>
        <?php include "header.php" ?>
    </header>

    <form method="POST" class="addingform">
        <span class="contentSpanInput">
            Nom : <input class="addinput" type="text" id="nameInput" name="nameInput"><br>
            Prenom : <input class="addinput" type="text" id="lastnameInput" name="lastnameInput"><br>
            Mail : <input class="addinput" type="text" id="mailInput" name="mailInput"><br>
        </span>
        <span class="contentSpanInput">
            Tel : <input class="addinput" type="text" id="telInput" name="telInput"><br>
            Grade : <input class="addinput" type="text" id="gradeInput" name="gradeInput"><br>
            MDP : <input class="addinput" type="text" id="mdpInput" name="mdpInput"><br>
        </span>
        <input type="submit" class="btn" value="Submit">
    </form>
        <?php addContact(); ?>
    
</body>

</html>