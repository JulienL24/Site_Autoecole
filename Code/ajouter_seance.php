<html>
	<head>
	  <meta charset="utf-8">
		<link rel="stylesheet" href="style.css" type="text/css"
	</head>
	<body>
		<?php
		//Récupération des variables
		$date=$_POST['date'];
		//echo"<br> $date";
		$effectif=$_POST['effectif'];
		//echo"<br> $effectif";
		$idtheme=$_POST['idtheme'];
		//echo"<br> $idtheme";
		date_default_timezone_set('Europe/Paris');
		$datedujour = date("Y\-m\-d");
		//echo"<br> $datedujour<br>";
		//Partie de connexion a la base de donnée
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92a061';
		$dbpass = 'KoZvFKs3';
		$dbname = 'nf92a061';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to
		mysql');
		//Verification même thème même jour
		$query1="SELECT * from seances WHERE DateSeance='$date' AND idtheme='$idtheme'";
		$result1=mysqli_query($connect,$query1);
		$compteur=mysqli_num_rows($result1);
		if($compteur==0 ) {
			if($date<$datedujour) {
				echo "Il est impossible d'enregistrer un séance dans le passé, veuiller réessayer";
			}
			else {
				$query  = "insert   into   seances   values   (NULL,   '$date', '$effectif', '$idtheme')";
				//echo "<br>$query<br>"; //Affiche la requête pour s'assurer qu'il n'y a pas d'erreur
				$result = mysqli_query($connect, $query); // $query utilise comme parametre de mysqli_query
				echo "La séance a bien été ajoutée";
				if (!$result) { echo "<br>pas bon".mysqli_error($connect);}
				mysqli_close($connect);
			}
		}
		else {
			echo "Il existe déja une séance sur le même thème ce jour là ! La saisie a donc été annulée.";
		}
		?>
	</body>
</html>
