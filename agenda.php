<?php
require_once "request.php";
session_start()
    ?>

<?php function addEvent()
{
    $db = openDB();
    if (isset($_POST["authorInput"]) && isset($_POST["dateInput"]) && isset($_POST["eventInput"])) {
        $EventName = strip_tags($_POST["eventInput"]);
        $Date = strip_tags($_POST["dateInput"]);
        $CreationDate = strip_tags($_POST["creationInput"]);
        $Author = strip_tags($_POST["authorInput"]);
        $stmt = $db->prepare("INSERT INTO agenda_event (NameOfEvent, Date, CreationDate, Author) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $EventName, $Date, $CreationDate, $Author);
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
    <link rel="stylesheet" href="assets/agenda.css">
    <title>Agenda</title>
</head>
<header>
    <?php include "header.php" ?>
</header>

<body>



    <form method="POST" class="addingform">
        <?php
            $dt = time();
            echo "<h1 class='day'> Nous somme le : " . date("d/m/Y", $dt) . "</h1>";
        ?>
        <input type="hidden" id="authorInput" name="authorInput" value="<?php echo $_SESSION['nom'] ?>">
        <input type="hidden" id="creationInput" name="creationInput" value="<?php echo date("Y/m/d", $dt) ?>">
        <label> Nom de l'évènement : </label> <textarea class="addinput" id="eventInput" name="eventInput" rows="10"
            cols="50"></textarea><br>
        <label> Date : </label> <span class="bottom"><input class="addinput" type="text" id="dateInput" name="dateInput"
                placeholder="YYYY-MM-JJ">
            <input class="submitButton" type="submit" value="Submit"></span>
    </form>
    <?php addEvent();
    ?>

    <div class="contentEvent">
        <?php generateEvent(); ?>
    </div>




</body>

</html>