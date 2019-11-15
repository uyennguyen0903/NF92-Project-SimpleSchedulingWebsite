<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Validation élève</title>
</head>
<body>
    <div align="center">
    <br><br><br><br><br><br>
    <?php
    $dbhost = 'tuxa.sme.utc';
    $dbuser = 'nf92a052'; 
    $dbpass = 'H5gEEpWi'; 
    $dbname = 'nf92a052'; 

    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("erreur de connexion au serveur");
    date_default_timezone_set('Europe/Paris');
    $date = date("Y-m-d");
    $nom = $_POST['nom'];
    $pnom = $_POST['prenom'];
    $naissance = $_POST['naissance'];
    $choix = $_POST['choix'];
    //choix = 0 -> ajouter un nouvel eleve avec nom, prenom deja existent
    if($choix==0)
    {
        $query="INSERT INTO eleves VALUES (NULL, '$nom', '$pnom', '$naissance', '$date')";
        mysqli_query($connect, $query);
        echo "<br>".$nom." ".$pnom." a été ajouté(e) comme nouveau élève.<br><br>";
        echo "<table><tr><td>Nom :</td>";
        echo "<td>".$nom."</td></tr>";
        echo "<tr><td>Prénom :</td>";
        echo "<td>".$pnom."</td></tr>";
        echo "<tr><td>Date de naissance :</td>";
        echo "<td>".$naissance."</td></tr>";
        echo "<tr><td>Date d'inscription :</td>";
        echo "<td>".$date."</td></tr></table>";
    }
    else
    {
        echo "<br>L'enregistrement du nouveau élève est annulé.";
    }
        
    mysqli_close($connect);
    ?>
</div>
</body>
</html>

