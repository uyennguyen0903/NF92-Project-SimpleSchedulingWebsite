s<html>
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
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Erreur de connexion au serveur");
            
    $ideleve = $_POST['menuChoixEleve'];
    $choix = $_POST['choix'];
    
    $query1 = "SELECT * FROM inscription WHERE ideleve=$ideleve";
    $result1 = mysqli_query($connect, $query1);
    $compteur1 = mysqli_num_rows($result1);

    if($compteur1==0){  //Vérification si l'élève est inscrit dans des séances du passé
        echo "<br><br>Cet élève n'a fait aucune séance !";
        echo "<br>La procédure est annulée.";
    }
    else{
        if($choix!=0){       //mode par thème
            $query3 = "SELECT nom, ROUND(AVG(note)) FROM seances, themes, inscription WHERE seances.idseance=inscription.idseance AND seances.idtheme=themes.idtheme AND inscription.ideleve=$ideleve AND inscription.note!=-1 GROUP BY themes.idtheme";
            $result3 = mysqli_query($connect, $query3);
            $compteur3 = mysqli_num_rows($result3);
            
            if($compteur3 == 0){
                echo "<br><br>Il n'y a aucune note.";
            }
            else{
                echo "<table>";
                echo "<tr><th>Thème :</th><th>Nombre moyen de fautes :</th></tr>";
                while($row3 = mysqli_fetch_array($result3)){
                echo "<tr><td>".$row3[0]."</td><td>".$row3[1]."</td></tr>";  
                }
            
            }
            echo "</table>";
        } 
        if($choix==0){  //mode séance par séance
            $query2 = "SELECT DateSeance, nom, note FROM seances, themes, inscription WHERE seances.idseance=inscription.idseance AND seances.idtheme=themes.idtheme AND inscription.ideleve=$ideleve";
            $result2 = mysqli_query($connect, $query2);
            $query2bis = "SELECT ROUND(AVG(note)) FROM inscription, seances WHERE note!=-1 AND seances.idseance=inscription.idseance AND inscription.ideleve=$ideleve";
            $result2bis = mysqli_query($connect, $query2bis);
            $compteur2bis = mysqli_num_rows($result2bis);
            
            echo "<table>";
            echo "<tr><th>Séance :</th><th>Nombre de fautes :</th></tr>";
            while($row2 = mysqli_fetch_array($result2)){
                if($row2[2]==-1){
                    $row2[2] = "-";
                }
                echo "<tr><td>".$row2[0]." (".$row2[1].")</td><td>".$row2[2]."</td></tr>";
            }
            while($row2bis = mysqli_fetch_array($result2bis)){
                if(empty($row2bis[0])){     //si il n'y a aucune note
                    $row2bis[0] = "-";
                }
                echo "<tr><td>Moyenne :</td><td>".$row2bis[0]."</td></tr>";
            }
            echo "</table>";
        }
    }
    mysqli_close($connect); 
    ?>
</div>
</body>
</html>

