<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Ajouter séance</title>
</head>
<body>
    <div align="center">
    <br><br><br>
    <?php
    $dbhost = 'tuxa.sme.utc';
    $dbuser = 'nf92a052'; 
    $dbpass = 'H5gEEpWi'; 
    $dbname = 'nf92a052';    
    
    $date = $_POST['date'];
    $EffMax = $_POST['EffMax'];
    $idtheme = $_POST['menuChoixTheme'];
    
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Erreur de connexion au serveur"); 
        
    $query1 = "SELECT nom FROM themes WHERE idtheme=$idtheme";
    $result1 = mysqli_query($connect, $query1);
    $row1 = mysqli_fetch_array($result1, MYSQLI_NUM);
    $nom_theme = $row1[0];   
        
    $query2 = "SELECT * FROM seances WHERE DateSeance='$date' AND idtheme=$idtheme";
    $result2 = mysqli_query($connect, $query2);
    $compteur2 = mysqli_num_rows($result2);
        
    if($compteur2==0){      //vérification qu'il n'y a pas de déja de séance à la même date pour le même thème
                
        $query3 = "INSERT INTO seances VALUES (NULL, '$date', $EffMax, $idtheme)";
        $result3 = mysqli_query($connect, $query3);
        echo "<br><br>La séance a été ajoutée à la base de donnée.<br><br>";
        echo "<table>";
        echo "<tr><td>Date de la séance :</td><td>".$date."</td></tr>";
        echo "<tr><td>Thème :</td><td>".$nom_theme."</td></tr>";
        echo "<tr><td>Effectif maximal :</td><td>".$EffMax."</td></tr>";
        echo "</table>";
        }
    else{
        echo "<br><br>Il y a déja une séance le ".$date." sur le thème ".$nom_theme." !<br><br>";
        echo "L'enregistrement de la nouvelle séance est annulé.";
    }
        
    mysqli_close($connect); 
    ?>
    </div>
</body>
</html>

