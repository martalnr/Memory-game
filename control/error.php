<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>

<body>
    <?php
    if (isset($_GET["error"])) {
    ?>

        <div id="content">
            <h2>Usuari o contrassenya incorrectes.</h2>
            <a href="../login.php"><strong>Tornar</strong> <br><br><br></a>
        </div>
        <br>

    <?php
    } else {
    ?>

        <div id="content">
            <h2>Has de passar abans per la pantalla de login.</h2>
            <a href="../login.php"><strong>Tornar</strong> <br><br><br></a>
        </div>
        <br>

    <?php
    }
    ?>
</body>

</html>