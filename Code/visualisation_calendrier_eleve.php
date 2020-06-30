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
    $query1="SELECT * FROM eleves";
    $result1 = mysqli_query($connect,$query1);
    echo "<FORM METHOD='POST' ACTION='visualiser_calendrier_eleve.php' >";
    echo "<br>";
    echo "De quel élève voulez vous consulter le calendrier?";
    echo "<br>";
    echo "<select name='ideleve' size='4'>";
    while ($row = mysqli_fetch_array($result1, MYSQL_NUM))
     {
      echo "<option value='$row[0]'>";
      echo "$row[2] $row[1]";
      echo "</option>";
    }
    echo "</select>";
    echo "<INPUT type='submit' value='Valider'>";
    echo "</FORM>";
    mysqli_close($connect);
    ?>
  </body>
</html>
