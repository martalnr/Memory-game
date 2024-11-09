<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc de memòria</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>

<body>

    <div id="content">
        <form class="login" action="./control/logincheck.php" method="post">

            <h1>Accedeix per jugar:</h1>

            <br><br>

            <label for="nom"></label>
            <input id="nom" name="nom" type="text" placeholder="USUARI">

            <br><br>

            <label for="password"></label>
            <input id="contrassenya" name="contrassenya" type="password" placeholder="CONTRASSENYA">

            <br><br>

            <input class="formulariEnviat" type="submit" value="Login" name="formulariEnviat">
            <input class="formulariReiniciat" type="reset" value="Reset" name="formulariReiniciat">

            <br><br><br>
        </form>
    </div>
</body>

</html>