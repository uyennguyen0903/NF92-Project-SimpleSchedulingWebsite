<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Inscription élève</title>
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

    $query1 = "SELECT idseance, DateSeance, nom FROM seances, themes WHERE DateSeance>='$today' AND seances.idtheme=themes.idtheme AND themes.supprime=0";
    $result1 = mysqli_query($connect, $query1);
        
    $query2 = "SELECT * FROM eleves";
    $result2 = mysqli_query($connect, $query2);
        
    echo "<form method='POST' action='inscrire_eleve.php'>";
    echo "<table>";
    echo "<tr><td>Séance :</td><td>";
    echo "<select name='menuChoixSeance' size='4' required>";

    while($row1=mysqli_fetch_array($result1, MYSQLI_NUM)){      //choix de la séance
        echo "<option value='$row1[0]'>";
        echo $row1[1]." (".$row1[2].")";
        echo "</option>";
    }
    echo "</select></td></tr>";
    echo "<tr><td>Elève :</td><td>";
    echo "<select name='menuChoixEleve' size='4' required>";

    while($row2=mysqli_fetch_array($result2, MYSQLI_NUM)){         //choix de l'élève
        echo "<option value='$row2[0]'>";
        echo $row2[0].") ".$row2[1]." ".$row2[2];
        echo "</option>";
    }
    
    echo "</select></td></tr>";
    echo "<tr><td colspan='2'><input type='submit' value='Inscrire élève à la séance'></td></tr>";
    echo "</table>";
    echo"</form>";
            
    mysqli_close($connect); 
    ?>
</div>
</body>
</html>

