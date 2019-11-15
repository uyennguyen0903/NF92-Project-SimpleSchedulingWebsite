<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Suppression thème</title>
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
    
    $idtheme = $_POST['menuChoixTheme'];
    $query = "UPDATE themes SET supprime=1 WHERE idtheme=$idtheme";
    $result = mysqli_query($connect, $query);
    echo "<br><br>Le thème a été supprimé.";
    
    mysqli_close($connect);
    ?>
</div>
</body>
</html>
