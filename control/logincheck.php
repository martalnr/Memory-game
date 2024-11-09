<?php

if (isset($_POST["formulariEnviat"])) {

    session_start();

    $nom = $_POST["nom"];
    $contra = $_POST["contrassenya"];

    $fitxerUsuaris = fopen("usuaris.txt", "r");
    $trobat = false;

    while (($linia = fgets($fitxerUsuaris)) && !$trobat) {

        $nomicontra = explode("/", trim($linia));

        $usuariNom = $nomicontra[0];
        $usuariContra = $nomicontra[1];

        if ($usuariNom == $nom && $usuariContra == $contra) {

            $trobat = true;
        }
    }

    fclose($fitxerUsuaris);

    if ($trobat) {

        $_SESSION["started"] = true;
        $_SESSION["nom"] = $nom;

        header("Location: ../joc/joc.php");
    } else {
        header("Location: error.php?error=ERROR_LOGUIN");
    }
} else {
    header("Location: error.php");
}