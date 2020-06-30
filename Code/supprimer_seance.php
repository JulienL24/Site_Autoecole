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
    $idseance=$_POST['idseance'];
    $query1="DELETE From inscription where idseance=$idseance";
    //echo "$query1";
    $result1 = mysqli_query($connect, $query1);
    $query2="DELETE FROM seances WHERE idseance=$idseance";
    //echo "$query2";
    $result2 = mysqli_query($connect, $query2);
    echo "<br>";
    echo "La séance a bien été supprimée";
    mysqli_close($connect);
     ?>
   </body>
</html>
