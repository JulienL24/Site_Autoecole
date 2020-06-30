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
		$query1="SELECT * from seances WHERE idseance='$idseance'";
		$query2="SELECT * from inscription WHERE idseance='$idseance'";
		$result1 = mysqli_query($connect,$query1);
		$result2 = mysqli_query($connect,$query2);
		$compteur=mysqli_num_rows($result2);
		$row = mysqli_fetch_array($result1, MYSQL_NUM);
		if($compteur>=$row[2] ) {
			echo "<br>";
			echo "La séance pour laquelle vous souhaitez inscrire cet élève est pleine, veuillez selectionner une autre séance";
		}
		else {
			$query3="SELECT * from inscription WHERE ideleve=$ideleve AND idseance=$idseance";
			$result3 = mysqli_query($connect,$query3);
			$compteur=mysqli_num_rows($result3);
			if($compteur==0 ) {
				$query   =   "insert   into   inscription   values   ('$ideleve','$idseance','-1')";
				//echo "<br>$query<br>";
			  $result2 = mysqli_query($connect, $query);
				echo "<br>";
				echo "L'élève a bien été inscrit à la séance";
				if (!$result2) { echo "<br>pas bon".mysqli_error($connect);
				}
			}
			else {
				echo "<br>";
				echo "C'est élève est déja inscrit à cette séance, le processus à été annulé";
			}
		}
		mysqli_close($connect);
		?>
	</body>
</html>
