<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Validation séance</title>
</head>
<body>
    <div align="center">
    <br><br><br>
    <?php
    $dbhost = 'tuxa.sme.utc';
    $dbuser = 'nf92a052';
    $dbpass = 'H5gEEpWi';
    $dbname = 'nf92a052';

    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Erreur de connexion au serveur");

    date_default_timezone_set('Europe/Paris');
    $today = date("Y-m-d");
    $query = "SELECT idseance, DateSeance, nom FROM seances, themes WHERE DateSeance<='$today' AND seances.idtheme=themes.idtheme AND themes.supprime=0";
    $result = mysqli_query($connect, $query);

    echo "<form method='POST' action='valider_seance.php'>";
    echo "<table>";
    echo "<tr><td>Séance :</td><td>";
    echo "<select name='menuChoixSeance' size='4' required>";
    while($row=mysqli_fetch_array($result)){
        echo "<option value='$row[0]'>";
        echo $row[1]." (".$row[2].")";
        echo "</option>";
    }
    echo "</select></td></tr>";
    echo "<tr><td><input type='submit' value='Valider séance'></td></tr></table>";
    echo "</form>";

    mysqli_close($connect);
    ?>
</div>
</body>
</html>
