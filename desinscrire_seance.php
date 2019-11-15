<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Désinscription élève</title>
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

    $query = "SELECT inscription.idseance, DateSeance, nom FROM inscription, seances, themes WHERE ideleve=$ideleve AND inscription.idseance=seances.idseance AND seances.idtheme=themes.idtheme AND themes.supprime=0 AND seances.DateSeance>='$today'";
    $result = mysqli_query($connect, $query);
    $compteur = mysqli_num_rows($result);

    if($compteur==0){   //vérification que l'élève est inscrit à au moins une séance
        echo "<br><br>Cet élève est inscrit à aucune séance.<br>";
        echo "La procédure de désincription est annulée.";
    }
    else{
        echo "<form method='POST' action='delete_seance.php'>";
        echo "<table>";
        echo "<tr><td>Séance :</td><td>";
        echo "<select name='menuChoixSeance' size='4' required>";
        while($row=mysqli_fetch_array($result)){
        echo "<option value='$row[0]'>";
        echo $row[1]." (".$row[2].")";
        echo "</option>";
        }
        echo "</select></td></tr>";
        echo "<input type='hidden' name='menuChoixEleve' value='$ideleve'>";
        echo "<tr><td colspan='2'><input type='submit' value='Choisir séance'></td></tr>";
        echo "</table>";
        echo "</form>";
    }

    mysqli_close($connect); 
    ?>
</div>
</body>
</html>

