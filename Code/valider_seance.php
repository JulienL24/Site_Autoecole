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
      $query ="SELECT eleves.ideleve,nom,prenom,note from inscription,eleves where (eleves.ideleve=inscription.ideleve and inscription.idseance=$idseance)";
      $result = mysqli_query($connect,$query);
      $compteur = mysqli_num_rows($result);
      if($compteur==0){
        echo "<br>";
        echo "<br><br>Aucun élève n'a été inscrit à cette séance.";
        echo "<br>La validation de la séance est annulée.";
      }
      else{
        echo "<FORM METHOD='POST' ACTION='noter_eleve.php' >";
        echo "<br>";
        echo "Remplissez le nombre de fautes de chaque élève";
        echo "<table>";
        echo "<input type='hidden' name='idseance' value='$idseance'>";
        echo "<tr><td>Elève :</td><td>Note :</td></tr>";
        while ($row = mysqli_fetch_array($result)){
          echo "<tr><td>$row[2] $row[1]</td>";
          echo "<td><input type='number' min='-1' max='40' name='$row[0]' value='$row[3]' ";
          echo "</td>";
        }
        echo "</td></tr>";
        echo "<tr><td colspan='2'><input type='submit' value='Valider les notes'></td></tr>";
        echo "</table>";
        echo "</form>";
      }
      mysqli_close($connect);
      ?>
    </body>
</html>
