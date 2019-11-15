<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Ajouter élève</title>
</head>
<body>
    <div align="center">
    <br><br><br>
    <?php
    if (empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["dn"]))
    {
        echo "Veuillez resaisir les données <br/>";
        echo "<input type='button' value='Retour' onClick='history.go(-1)'>";
    }
    else
    {
        $dbhost = 'tuxa.sme.utc';
        $dbuser = 'nf92a052'; 
        $dbpass = 'H5gEEpWi'; 
        $dbname = 'nf92a052'; 

        $nom = $_POST['nom']; 
        $pnom = $_POST['prenom'];
        $naissance = $_POST['dn'];
        date_default_timezone_set('Europe/Paris');
        $date = date("Y\-m\-d");
        //Verifier date de naissance valide
        if ($naissance >= $date)
        {
            echo "La date de naissance insérée est supérieure à la date du jour !<br>";
            echo "Veuillez resaisir les données <br/>";
            echo "<input type='button' value='Retour' onClick='history.go(-1)'>";
        }
        else
        {
            $connect   =   mysqli_connect($dbhost,   $dbuser,   $dbpass,   $dbname)   or   die   ('Error connecting to mysql');
            $query = "SELECT * FROM eleves WHERE nom='$nom' AND prenom='$pnom'";
            $result = mysqli_query($connect, $query);
            $compteur = mysqli_num_rows($result);
            ////vérifier si il y a déja une personne avec le même nom,prénom
            if ($compteur == 0)
            {
                $query = "INSERT INTO eleves VALUES (NULL, '$nom', '$pnom', '$naissance', '$date')"; 
                echo "<br>".$nom." ".$pnom." a été ajouté(e) à la base de donnée comme nouveau élève.<br>";
                echo "<table>";
                echo "<tr><td>Nom :</td><td>".$nom."</td></tr>";
                echo "<tr><td>Prénom :</td><td>".$pnom."</td></tr>";
                echo "<tr><td>Date de naissance :</td><td>".$naissance."</td></tr>";
                echo "<tr><td>Date d'inscription :</td><td>".$date."</td></tr>";
                echo "</table>";
                $result = mysqli_query($connect, $query);
                if (!$result) { 
                    echo "<br>Pas bon".mysqli_error($connect);
                }
                mysqli_close($connect);
            } 
            else
            {

                echo "<br>".$nom." ".$pnom." existe déjà<br>";
                echo "Voulez-vous vraiment ajouter un autre élève ? :<br><br>";
                echo "<table>";
                echo "<form method='POST' action='valider_eleve.php'>";
                echo "<tr><td>";
                echo "<input type='radio' name='choix' value='0'>Oui<br>";
                echo "<input type='radio' name='choix' value='1'>Non";
                echo "<input type='hidden' name='nom' value='$nom'>";
                echo "<input type='hidden' name='naissance' value='$naissance'>";
                echo "<input type='hidden' name='prenom' value='$pnom'>";
                echo "</td></tr>";
                echo "<tr><td><input type='submit' value='Valider'></td></tr>";
                echo "</form>";
                echo "</table>";
            }
        }
    }
    ?>
</div>
</body>
</html>

