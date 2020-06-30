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
    $idtheme=$_POST['idtheme'];
    $query="UPDATE themes SET supprime=1 where idtheme=$idtheme";
    //echo "$query";
    $result = mysqli_query($connect, $query);
    echo "<br>";
    echo "Le thème a bien été supprimé";
    mysqli_close($connect);
     ?>
   </body>
</html>
