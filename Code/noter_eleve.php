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
      $connect= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die ('Error connecting to mysql');
      $idseance=$_POST['idseance'];
      $query ="SELECT eleves.ideleve,nom,prenom,note from inscription,eleves where (eleves.ideleve=inscription.ideleve and inscription.idseance=$idseance)";
      $result = mysqli_query($connect,$query);
      while ($row = mysqli_fetch_array($result)){
        $ideleve=$row[0];
        $note=$_POST["$ideleve"];
        $query2="UPDATE inscription SET note=$note where ideleve=$ideleve AND idseance=$idseance";
        //echo "$query2";
        $result2 = mysqli_query($connect, $query2);
      }
      $query3 = "SELECT inscription.ideleve, nom, prenom, note FROM inscription, eleves WHERE inscription.idseance=$idseance AND inscription.ideleve=eleves.ideleve";
      $result3 = mysqli_query($connect, $query3);
      echo "<br>";
      echo"<br><br>Les notes ont été enregistrées.<br><br>";
      echo "<table>";
      echo "<tr><th>Elève :</th><th>Note :</th></tr>";
      while($row3 = mysqli_fetch_array($result3)){        //afficher le récapitulatif des notes
          if($row3[3]==-1){
              $row3[3] = "-";
          }
          echo "<tr><td>".$row3[1]." ".$row3[2]."</td><td>".$row3[3]."</td></tr>";
      }
      echo "</table>";
      mysqli_close($connect);
       ?>
     </body>
</html>
