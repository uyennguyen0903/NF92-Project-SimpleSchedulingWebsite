<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>suppression séance</title>
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
    
    $query1 = "DELETE FROM seances WHERE idseance=$idseance";
    $query2 = "DELETE FROM inscription WHERE idseance=$idseance";
    $result1 = mysqli_query($connect, $query1);
    $result2 = mysqli_query($connect, $query2);

    echo "<br><br>La séance a été supprimée de la base de donnée.";
    
    mysqli_close($connect); 
    ?>
</div>
</body>
</html>

