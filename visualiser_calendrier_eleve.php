<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Visualiser calendrier élève</title>
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

    $ideleve = $_POST['menuChoixEleve'];
    date_default_timezone_set('Europe/Paris');
    $today = date("Y-m-d");

    $query = "SELECT DateSeance, nom FROM inscription, seances, themes WHERE inscription.ideleve=$ideleve AND inscription.idseance=seances.idseance AND seances.idtheme=themes.idtheme AND seances.DateSeance>='$today'";
    $result = mysqli_query($connect, $query);

    echo "<table>";
    echo "<tr><td>Date de la séance</td><td>Thème :</td></tr>";
    while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
    }
    echo "</table>";


    mysqli_close($connect);
    ?>
</div>
</body>
</html>
