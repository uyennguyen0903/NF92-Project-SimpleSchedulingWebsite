<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Consultation élève</title>
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

    $query = "SELECT * FROM eleves WHERE ideleve=$ideleve";
    $result = mysqli_query($connect, $query);

    echo "<table>";
    echo "<tr><td>ID</td><td>Nom</td><td>Prénom</td><td>Date de naissance</td><td>Date d'inscription</td></tr>";
    while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
    }
    echo "</table>";


    mysqli_close($connect);
    ?>
    </div>
</body>
</html>
