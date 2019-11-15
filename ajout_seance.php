<html>
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

    date_default_timezone_set('Europe/Paris');
    $today = date("Y-m-d");
    
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Erreur de connexion au serveur");
    
    $query="SELECT * FROM themes WHERE supprime=0";
    $result = mysqli_query($connect, $query);
    echo "<form method='POST' action='ajouter_seance.php'>";
    echo "<table>";
    echo "<tr><td colspan='2'>";
    echo "<select name='menuChoixTheme' size='4' required>";
    while($row=mysqli_fetch_array($result, MYSQLI_NUM))
    {
        echo "<option value='$row[0]'>";
        echo $row[1];
        echo "</option>";
    }
    echo "</select></td></tr>";
    echo "<tr><td>Date :</td><td><input type='date' name='date' min=$today required></td></tr>";
    echo "<tr><td>Effectif maximal :</td><td><input type='number' name='EffMax' min='1' required></td></tr>";
    echo "<tr><td><input type='submit' value='Ajouter séance'</td></tr>";
    echo "</table>";
    echo"</form>";
    
    mysqli_close($connect); 
    ?>
</div>
</body>
</html>

