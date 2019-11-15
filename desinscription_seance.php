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
            
    $query = "SELECT * FROM eleves";
    $result = mysqli_query($connect, $query);

    echo "<form method='POST' action='desinscrire_seance.php'>";
    echo "<table>";
    echo "<tr><td>Elève :</td><td>";
    echo "<select name='menuChoixEleve' size='4' required>";
    while($row=mysqli_fetch_array($result)){
        echo "<option value='$row[0]'>";
        echo $row[0].") ".$row[1]." ".$row[2];
        echo "</option>";
    }
    echo "</select></td></tr>";
    echo "<tr><td colspan='2'><input type='submit' value='Choisir élève'></td></tr>";
    echo "</table>";
    echo "</form>";
    
    mysqli_close($connect); 

    ?>
</div>
</body>
</html>

