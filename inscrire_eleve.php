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

    $idseance = $_POST['menuChoixSeance'];
    $ideleve = $_POST['menuChoixEleve'];

    $query1 = "SELECT COUNT(ideleve), idseance FROM inscription WHERE idseance=$idseance";
    $result1 = mysqli_query($connect, $query1);
    while($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)){
        $effectif = $row1[0];      //compter le nombre d'élèves déja inscrit à la séance
    }

    $query2 = "SELECT * FROM inscription WHERE ideleve=$ideleve AND idseance=$idseance";
    $result2 = mysqli_query($connect, $query2);
    $compteur2 = mysqli_num_rows($result2);

    if($compteur2==0){          //vérification si l'élève est déja inscrit à la séance
        $query3 = "SELECT * FROM seances WHERE idseance=$idseance AND $effectif<EffMax";
        $result3 = mysqli_query($connect, $query3);
        $compteur3 = mysqli_num_rows($result3);

        if($compteur3==1){      //vérification si l'effectif maximal est dépassé
            $query4 = "INSERT INTO inscription(idseance, ideleve) VALUES($idseance, $ideleve)";
            $result4 = mysqli_query($connect, $query4);
            echo "<br><br>L'élève est inscrit à la séance.";
        }
        else{
            echo "<br><br>L'effectif maximal de cette séance est déja atteint.<br>";
            echo "L'inscription de l'élève est annulée.";
        }
    }
    else{
        echo "<br><br>L'élève est déja inscrit à la séance.<br>";
        echo "L'inscription de l'élève est annulée.";
    }

    mysqli_close($connect);
    ?>
</div>
</body>
</html>
