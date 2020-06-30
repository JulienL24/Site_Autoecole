<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
  </head>
  <body>
    <?php
    $nom=$_POST['nom'];
    //echo"<br> $nom";
    $prenom=$_POST['prenom'];
    //echo"<br> $prenom";
    $date_naissance=$_POST['date_naissance'];
    //echo"<br> $date_naissance";
    $valid=$_POST['valid'];
    //echo"<br> $valid";
    $date =$_POST['date'];
    //Partie de connexion a la base de donnée
    $dbhost = 'tuxa.sme.utc';
    $dbuser = 'nf92a061';
    $dbpass = 'KoZvFKs3';
    $dbname = 'nf92a061';
    $connect= mysqli_connect($dbhost,   $dbuser,   $dbpass,   $dbname)   or   die   ('Error   connecting   to mysql');
    $query = "insert   into   eleves   values   (NULL,   '$nom',   '$prenom',   '$date_naissance',"."'$date'".")";
    //echo "<br>$query<br>"; //Affiche la requête pour s'assurer qu'il n'y a pas d'erreur
    if ($valid=='oui') {
      echo "L'élève a bien été ajouté";
      $result2 = mysqli_query($connect, $query); // $query utilise comme parametre de mysqli_query
      if (!$result2) { echo "<br>pas bon".mysqli_error($connect);}
    }
    else {
      echo"L'ajout de l'élève a bien été annulé";
    }
    mysqli_close($connect);
    ?>
  </body>
</html>
