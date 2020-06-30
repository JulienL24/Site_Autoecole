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
		$prenom=$_POST['prenom'];
		//echo"<br> $prenom";
		$date_naissance=$_POST['date_naissance'];
		//echo"<br> $date_naissance";
		date_default_timezone_set('Europe/Paris');
		$date = date("Y\-m\-d");
		//echo "<br> la date est : "."'$date'"." <br>";
		//Partie de connexion a la base de donnée
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92a061';
		$dbpass = 'KoZvFKs3';
		$dbname = 'nf92a061';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
		$query1="SELECT * from eleves WHERE nom='$nom' AND prenom='$prenom'";
		$result1 = mysqli_query($connect,$query1);
		$compteur=mysqli_num_rows($result1);
		if($compteur==0 ) {
			$query   =   "insert   into   eleves   values   (NULL,   '$nom',   '$prenom',   '$date_naissance',"."'$date'".")";
			//echo "<br>$query<br>";
			echo "L'élève a bien été ajouté";
			$result2 = mysqli_query($connect, $query);
			if (!$result2) { echo "<br>Pas bon".mysqli_error($connect);}
		}
		else {
			echo "Il existe déja un élève avec le même nom et prenom, voulez vous continuer votre saisie ?";
			echo "<br>";
			echo "<form method='post' action='valider_eleve.php'>";
			echo "<input type='hidden' name='nom' value='$nom'>";
			echo "<input type='hidden' name='prenom' value='$prenom'>";
			echo "<input type='hidden' name='date_naissance' value='$date_naissance'>";
			echo "<input type='hidden' name='date' value='$date'>";
			echo "<input type='radio' name='valid' value='oui'>Continuer <br>";
			echo "<input type='radio' name='valid' value='non' checked>Annuler <br>";
			echo "<input type='submit' value='Confirmer'>";
		}
		mysqli_close($connect);
		?>
	</body>
</html>
