<html>
  <head>
    <link rel="stylesheet" href="style.css" type="text/css"
    <meta charset="utf-8">
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
    <FORM METHOD='POST' ACTION='ajouter_seance.php' >
    <br>
    Date de la séance :
    <br>
    <input type='date' name='date' placeholder='Ex : 2012-12-12'
    pattern ='[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]' required>
    <br>
    Effectif maximal pour la séance :
    <br>
    <input type='text' name='effectif' placeholder='Ex : 32' pattern ='[0-9]+'>
    <br>
    Quel est le thème de la séance ?
    <br>
    <select name='idtheme' size='4'>
    <?php
    while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
      if ($row[2]==0) {
      echo "<option value='$row[0]'>$row[1]</option>";}
      }
    ?>
    <br>
    <INPUT type='submit' value='Enregistrer séance'>
    </FORM>
    <?php
    mysqli_close($connect);
     ?>
  </body>
</html>
