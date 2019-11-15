<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="stylesheets/main.css" rel="stylesheet">
    <link href="stylesheets/header.css" rel="stylesheet">
    <title>Ajouter thème</title>
</head>
<body>
    <br><br><br>
    <div align="center">
	<?php 
		$dbhost = 'tuxa.sme.utc';
        $dbuser = 'nf92a052'; 
        $dbpass = 'H5gEEpWi'; 
        $dbname = 'nf92a052';

        $nom = $_POST['nom'];
        $descriptif = $_POST['descriptif'];
        
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Erreur de connexion au serveur");
        $query1 = "SELECT * FROM themes WHERE nom='$nom' AND supprime=1";
        $result1 = mysqli_query($connect, $query1);
        $compteur1 = mysqli_num_rows($result1);
        //vérification si un thème supprimé à le même nom
        if($compteur1==1)
        {
            $query2 = "UPDATE themes SET supprime=0, descriptif='$descriptif' WHERE nom='$nom'";
            $result2 = mysqli_query($connect, $query2);
            echo "<br>Le thème a été réactivé.<br>";
            echo "<table>";
            echo "<tr><td>Nom :</td><td>".$nom."</td></tr>";
            echo "<tr><td>Descriptif :</td><td>".$descriptif."</td></tr>";
            echo "</table>";
        }
  		else  
        {
			$query2 = "SELECT * FROM themes WHERE nom='$nom' AND supprime=0";
            $result2 = mysqli_query($connect, $query2);
            $compteur2 = mysqli_num_rows($result2);
            if($compteur2==0)  //vérification si un thème actif à le même nom
            {      
                $query3 = "INSERT INTO themes VALUES (NULL, '$nom', 0, '$descriptif')";
                $result3 = mysqli_query($connect, $query3);
                echo "<br>".$descriptif." a été ajouté comme nouveau thème.<br>";
                echo "<table>";
                echo "<tr><td>Nom :</td><td>".$nom."</td></tr>";
                echo "<tr><td>Descriptif :</td><td>".$descriptif."</td></tr>";
                echo "</table>";
            }
            else
            {
                echo "<br>Il y a déja un thème actif avec le même nom.<br>";
                echo "L'enregistrement du thème est annulé.";
            }   
        }
        mysqli_close($connect); 
	?>	
</div>
</body>
</html>