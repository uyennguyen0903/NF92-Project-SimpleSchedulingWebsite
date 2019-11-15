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

    $idseance = $_POST['menuChoixSeance'];
    $i = 1;

    $query = "SELECT * FROM eleves, inscription  WHERE inscription.ideleve=eleves.ideleve AND inscription.idseance=$idseance";
    $result = mysqli_query($connect, $query);
    $compteur = mysqli_num_rows($result);

    if($compteur==0){
        echo "<br><br>Aucun élève n'a été inscrit à cette séance.";
        echo "<br>La validation de la séance est annulée.";
    }
    else{
        echo "<form method='POST' action='noter_eleves.php'>";
        echo "<table>";
        echo "<input type='hidden' name='menuChoixSeance' value='$idseance'>";
        echo "<tr><th>Elève :</td><td>Note :</th></tr>";
        while($row=mysqli_fetch_array($result)){
            echo "<tr><td>";
            echo $row[0].") ".$row[1]." ".$row[2];
            echo "</td>";
            if($row[7]!=NULL){    //Vérification si l'élève a déja été noté
                echo "<td><input name='note".$i."' type='number' min='0' max='40' value='$row[7]' readonly></td</tr>";
            }
            else{
                echo "<td><input name='note".$i."' type='number' min='0' max='40'></td</tr>";
            }
            $i = $i + 1;
        }
        echo "</td></tr>";
        echo "<tr><td><input type='submit' value='Valider élèves'></td></tr>";
        echo "</table>";
        echo "</form>";

    }

    mysqli_close($connect);
    ?>
</div>
</body>
</html>
