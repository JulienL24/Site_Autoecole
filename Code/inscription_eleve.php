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
    $connect   =   mysqli_connect($dbhost,   $dbuser,   $dbpass,   $dbname)   or   die   ('Error   connecting   to
    mysql');
    date_default_timezone_set('Europe/Paris');
    $date = date("Y\-m\-d");
    //echo "<br> la date est : "."'$date'"." <br>";
    $query1="SELECT * FROM eleves";
    $result1 = mysqli_query($connect,$query1);
    echo "<FORM METHOD='POST' ACTION='inscrire_eleve.php' >";
    echo "<br>";
    echo "Quel élève voulez vous inscrire ?";
    echo "<br>";
    echo "<select name='ideleve' size='4'>";
    while ($row = mysqli_fetch_array($result1, MYSQL_NUM))
     {
      echo "<option value='$row[0]'>";
      echo "$row[2] $row[1]";
      echo "</option>";
    }
    echo "</select>";
    $query2="SELECT * FROM themes,seances where (themes.idtheme=seances.idtheme and seances.DateSeance>=CURRENT_DATE)";
    $result2 = mysqli_query($connect,$query2);
    echo "<br>
    A quel séance voulez vous inscrire cet élève ?
    <select name='idseance' size='4'>";
    while ($row = mysqli_fetch_array($result2, MYSQL_NUM))
    {
      echo "<option value='$row[4]'>$row[1] le $row[5]</option>";
    }
    echo "</select>";
    echo "<br>";
    echo "<INPUT type='submit' value='Valider inscription'>";
    echo "</FORM>";
    mysqli_close($connect);
    ?>
  </body>
</html>
