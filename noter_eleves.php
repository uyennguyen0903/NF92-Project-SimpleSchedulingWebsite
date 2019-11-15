<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Noter</title>
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

    $query1 = "SELECT * FROM eleves, inscription  WHERE inscription.ideleve=eleves.ideleve AND inscription.idseance=$idseance";
    $result1 = mysqli_query($connect, $query1);

    while($row1 = mysqli_fetch_array($result1)){
        $note = $_POST["note".$i];
        if(empty($note)){
            $note = NULL;
        }
        $ideleve = $row1[0];

        $query2 = "UPDATE inscription SET note=$note WHERE inscription.idseance=$idseance AND inscription.ideleve=$ideleve";
        $result2 = mysqli_query($connect, $query2);
        $i = $i + 1;
    }

    $query3 = "SELECT inscription.ideleve, nom, prenom, note FROM inscription, eleves WHERE inscription.idseance=$idseance AND inscription.ideleve=eleves.ideleve";
    $result3 = mysqli_query($connect, $query3);

    echo"<br><br>Les notes ont été enregistrées.<br><br>";
    echo "<table>";
    echo "<tr><th>Elève :</th><th>Note :</th></tr>";
    while($row3 = mysqli_fetch_array($result3)){
        if($row3[3]==NULL){
            $row3[3] = "-";
        }
        echo "<tr><td>".$row3[0].") ".$row3[1]." ".$row3[2]."</td><td>".$row3[3]."</td></tr>";
    }
    echo "</table>";

    mysqli_close($connect);
    ?>
</div>
</body>
</html>
