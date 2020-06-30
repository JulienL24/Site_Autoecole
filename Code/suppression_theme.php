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
    $result = mysqli_query($connect,"SELECT * FROM themes");
    ?>
    <FORM METHOD='POST' ACTION='supprimer_theme.php' >
    <br>
    Quel thème voulez vous supprimer ?
    <br>
    <select name='idtheme' size='4'>
    <?php
    while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
      if ($row[2]==0) {
      echo "<option value='$row[0]'>$row[1]</option>";}
      }
    ?>
    <br>
    <INPUT type='submit' value='Supprimer'>
    </FORM>
    <?php
    mysqli_close($connect);
     ?>
  </body>
</html>
