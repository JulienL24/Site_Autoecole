<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" type="text/css"
	</head>
	<body>
		<?php
		//Récupération des variables
		$nom=$_POST['nom'];
		//echo"<br> $nom";
		$descriptif=$_POST['descriptif'];
		//echo"<br> $descriptif";
		//Partie de connexion a la base de donnée
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92a061';
		$dbpass = 'KoZvFKs3';
		$dbname = 'nf92a061';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to
		mysql');
		$nom=mysqli_real_escape_string($connect, $nom);
		$descriptif=mysqli_real_escape_string($connect, $descriptif);//Permet de prendre en compte les appostrophes
		$query1="SELECT * from themes WHERE nom='$nom'";
		$result1 = mysqli_query($connect,$query1);
		$compteur=mysqli_num_rows($result1);
		if($compteur==0 ) {
			$query   =   "insert   into   themes   values   (NULL,   '$nom', '0',  '$descriptif')";
			//echo "<br>$query<br>"; //Affiche la requête pour s'assurer qu'il n'y a pas d'erreur
			echo "Le thème a bien été ajouté";
			$result = mysqli_query($connect, $query); // $query utilise comme parametre de mysqli_query
			if (!$result) { echo "<br>pas bon".mysqli_error($connect);}
			mysqli_close($connect);
		}
		else {
			$query2="SELECT * from themes WHERE nom='$nom' and supprime=0";
			$result2= mysqli_query($connect, $query2);
			$compteur2=mysqli_num_rows($result2);
			if ($compteur2==1) {
				echo "Il existe déja un thème identique, l'ajout a été annulé";
			}
			else {
				echo "<br>Il existe déja un thème identique qui a été précedemment supprimé, il va donc être réactivé";
				echo "<br>";
				$query="UPDATE themes SET supprime=0 where nom='$nom'";
		    //echo "$query";
		    $result = mysqli_query($connect, $query);
			}
		}
		?>
	</body>
</html>
