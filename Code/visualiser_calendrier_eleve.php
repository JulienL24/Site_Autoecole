<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
  </head>
  <body>
    <?php
    //Partie de connexion a la base de donnée
    $dbhost = 'tuxa.sme.utc';
    $dbuser = 'nf92a061';
    $dbpass = 'KoZvFKs3';
    $dbname = 'nf92a061';
    $connect= mysqli_connect($dbhost,   $dbuser,   $dbpass,   $dbname)   or   die   ('Error   connecting   to
    mysql');
    $ideleve=$_POST['ideleve'];
    $query1 ="SELECT DateSeance,eleves.nom,prenom,themes.nom from inscription,seances,themes,eleves where (inscription.ideleve=$ideleve and inscription.idseance=seances.idseance and seances.idtheme=themes.idtheme and inscription.ideleve=eleves.ideleve /*and seances.DateSeance>=CURDATE()*/)";
    //echo "$query1";
    $result1 = mysqli_query($connect,$query1);
    $query2 = "SELECT nom,prenom from eleves where (ideleve=$ideleve)";
    $result2 = mysqli_query($connect,$query2);
    $row2 = mysqli_fetch_array($result2, MYSQL_NUM);
    echo "<br>";
    echo "L'élève $row2[1] $row2[0] est inscrit aux séances suivantes :<br>";
    echo "<br>";
    echo "<table>";
    echo "<tr><td>Date de la séance</td><td>Thème :</td></tr>";
    while ($row1 = mysqli_fetch_array($result1, MYSQL_NUM)) {
    echo "<tr><td>".$row1[3]."</td><td>".$row1[0]."</td></tr>";
    }
    echo "</table>";

    mysqli_close($connect);
    ?>
   </body>
</html>
