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
    $idseance = $_POST['menuChoixSeance'];

    $query = "DELETE FROM inscription WHERE idseance=$idseance AND ideleve=$ideleve";
    $result = mysqli_query($connect, $query);
    echo "<br><br>L'élève a été désinscrit de cette séance.";
    
    mysqli_close($connect); 
    ?>
</div>
</body>
</html>

