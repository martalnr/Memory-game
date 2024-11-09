<?php

function creataula()
{

    $allFitxes = [];
    $index = 0;

    for ($i = 128000; $i <= 128060; $i++) {

        $allFitxes[$index] = "&#" . $i;
        $index++;
    }

    shuffle($allFitxes);

    $fitxes = [];
    $index = 10;

    for ($i = 0; $i < 10; $i++) {

        $fitxes[$i] = $allFitxes[$i];
        $fitxes[$index] = $allFitxes[$i];
        $index++;
    }

    shuffle($fitxes);
    return $fitxes;
}

function mostrataula()
{
    $cont = 0;
?>
    <table>
        <?php
        for ($i = 0; $i < 4; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 5; $j++) {
                $fitxa = $_SESSION["tauler"][$cont];
                if ($_SESSION["visible"][$cont]) {
                    echo "<td><form action='' method='post'><button class='fitxa' type='submit' name='gira' value='$cont'>$fitxa</button></form></td>";
                } else {
                    echo "<td><form action='' method='post'><button class='fitxa' type='submit' name='gira' value='$cont'>&#128070</button></form></td>";
                }
                $cont++;
            }
            echo "</tr>";
        }
        ?>
    </table>
<?php
}

function guanya()
{
    foreach ($_SESSION["visible"] as $cartaVisible) {
        if (!$cartaVisible) {
            return false;
        }
    }
    return true;
}
