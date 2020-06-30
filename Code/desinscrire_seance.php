<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" type="text/css"
	</head>
	<body>
		<?php
		//Récupération des variables
		$ideleve=$_POST['ideleve'];
		//echo"<br> $ideleve";
		$idseance=$_POST['idseance'];
		//echo"<br> $idseance";
		date_default_timezone_set('Europe/Paris');
		$date = date("Y\-m\-d");
		//echo "<br> la date est : "."'$date'"." <br>";
		//Partie de connexion a la base de donnée
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92a061';
		$dbpass = 'KoZvFKs3';
		$dbname = 'nf92a061';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
		$query1="SELECT * from inscription WHERE ideleve=$ideleve AND idseance=$idseance";
		$result1 = mysqli_query($connect,$query1);
		$compteur=mysqli_num_rows($result1);
		if($compteur==0 ) {
			echo "<br>";
			echo "Cet élève n'était pas inscrit à cette séance, il n'a donc pas pu être désinscrit";
		}
		else {
			$query2 ="DELETE FROM inscription WHERE inscription.ideleve = $ideleve AND inscription.idseance = $idseance";
			//echo "$query2";
			$result = mysqli_query($connect,$query2);
			echo "<br>";
			echo "L'élève a bien été desinscrit";
		}
		mysqli_close($connect);
		?>
	</body>
</html>
