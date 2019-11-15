<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>suppression thème</title>
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
    
    $query="SELECT * FROM themes WHERE supprime=0";
    $result = mysqli_query($connect, $query);
    echo "<form method='POST' action='supprimer_theme.php'>";
    echo "<table>";
    echo "<tr><td>Thème :</td><td>";
    echo "<select name='menuChoixTheme' size='4' required>";
    while($row=mysqli_fetch_array($result, MYSQLI_NUM)){
        echo "<option value='$row[0]'>";
        echo $row[1];
        echo "</option>";
    }
    echo "</select></td></tr>";
    echo "<tr><td><input type='submit' value='Supprimer thème'</td></tr>";
    echo "</table>";
    echo"</form>";
    
    mysqli_close($connect);
    ?>
</div>
</body>
</html>
