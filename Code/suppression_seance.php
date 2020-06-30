
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
    $connect=  mysqli_connect($dbhost,   $dbuser,   $dbpass,   $dbname)   or   die   ('Error   connecting   to
    mysql');
    $query ="SELECT idseance,DateSeance,nom FROM seances,themes where seances.idtheme=themes.idtheme and seances.DateSeance>=CURDATE()";
    $result = mysqli_query($connect,$query);
    ?>
    <FORM METHOD='POST' ACTION='supprimer_seance.php' >
    <br>
    Quelle séance voulez vous supprimer ?
    <br>
    <select name='idseance' size='4'>
    <?php
    while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
      echo "<option value='$row[0]'>$row[1] $row[2]</option>";
      }
    ?>
    <br>
    <INPUT type='submit' value='Noter séance'>
    </FORM>
    <?php
    mysqli_close($connect);
    ?>
   </body>
</html>
