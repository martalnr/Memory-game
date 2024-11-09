<?php
session_start();
if (!isset($_SESSION["started"])) {
    header("Location: ../control/error.php");
} else if (isset($_POST["sortir"])) {
    $_SESSION["nombreJugades"] = 0;
    header("Location: ../login.php");
} else {
    include "funcions.php";
    $recordNom = "record_" . $_SESSION["nom"];

    // PARA COMPROBACIONES:
    //foreach ($_COOKIE as $nombreCookie => $valorCookie) {
    //   if (strpos($nombreCookie, "record_") === 0) {
    //     setcookie($nombreCookie, "", time() - 3600, "/");
    // }
    //}
    //$_SESSION["nombreJugades"]=0;

    if ((!isset($_SESSION["tauler"])) || (isset($_POST["reiniciar"]))) {
        $_SESSION["tauler"] = creataula();
        $_SESSION["visible"] = array_fill(0, 20, false);
        $_SESSION["jugades"] = 0;
        $_SESSION["carta1"] = null;
        $_SESSION["carta2"] = null;
        $_SESSION["index1"] = null;
        $_SESSION["index2"] = null;
        $_SESSION["nombreJugades"] = 0;
    }

    if (isset($_POST["gira"])) {

        $index = ($_POST["gira"]);

        if ($_SESSION["visible"][$index]) {
        } else {

            $_SESSION["jugades"]++;

            if ($_SESSION["jugades"] == 1) {

                $_SESSION["carta1"] = $_SESSION["tauler"][$index];
                $_SESSION["index1"] = $index;
                $_SESSION["visible"][$index] = true;
            } elseif ($_SESSION["jugades"] == 2) {

                $_SESSION["carta2"] = $_SESSION["tauler"][$index];
                $_SESSION["index2"] = $index;
                $_SESSION["visible"][$index] = true;

                $_SESSION["nombreJugades"]++;

                if ($_SESSION["carta1"] == $_SESSION["carta2"]) {

                    $_SESSION["carta1"] = null;
                    $_SESSION["carta2"] = null;
                    $_SESSION["jugades"] = 0;
                }
            } elseif ($_SESSION["jugades"] == 3) {

                $_SESSION["visible"][$_SESSION["index1"]] = false;
                $_SESSION["visible"][$_SESSION["index2"]] = false;

                $_SESSION["carta1"] = $_SESSION["tauler"][$index];
                $_SESSION["index1"] = $index;
                $_SESSION["visible"][$index] = true;

                $_SESSION["jugades"] = 1;
                $_SESSION["carta2"] = null;
                $_SESSION["index2"] = null;
            }
        }
    }

    if (guanya() && (!isset($_COOKIE[$recordNom]) || $_SESSION["nombreJugades"] < $_COOKIE[$recordNom])) {

        setcookie($recordNom, $_SESSION["nombreJugades"], time() + (30 * 24 * 60 * 60), "/");
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Joc de memòria</title>
        <link rel="stylesheet" href="../styles/joc.css">
    </head>

    <body>
        <div class="container">
            <h1>Hola, <?php echo ($_SESSION["nom"]); ?></h1>

            <form method="post" action="">
                <?php mostrataula(); ?>
                <button class="reiniciar" type="submit" name="reiniciar">Nova partida</button>
            </form>

            <h1>Portes <?php echo isset($_SESSION["nombreJugades"]) ? $_SESSION["nombreJugades"] : 0; ?> jugades</h1>
            <h1>El teu record és de <?php echo isset($_COOKIE[$recordNom]) ? $_COOKIE[$recordNom] : 0; ?> jugades</h1>

            <form method="post" action="">
                <button class="logout" type="submit" name="sortir">Tancar sessió</button>
            </form>
        </div>
    </body>

    </html>
<?php
}
