<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"
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
		//echo"<br> $ideleve";
    echo"<br>";
    $query1="SELECT * from eleves WHERE ideleve='$ideleve'";
    $result1 = mysqli_query($connect,$query1);
    $row = mysqli_fetch_array($result1, MYSQL_NUM);
    echo "$row[2] $row[1]";
    echo "<br>";
    echo "Né le $row[3]";
    echo "<br>";
    echo "Inscrit depuis le $row[4]";
    mysqli_close($connect);
    ?>
  </body>
</html>
