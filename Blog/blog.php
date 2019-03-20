<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
   <head> 
      <title>Blog</title> 
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   </head> 
<body> 
   <h2>Blog</h2> 
   <hr /> 
   <?php 
   //$connect = mysqli_connect("localhost", "root", "test", "blog"); 
   $dsn = 'mysql:dbname=blog;host=localhost';
   $user = 'root';
   $password = 'test';
   /* Vérification de la connexion */ 
   try 
   {
      $connection = new PDO($dsn, $user, $password);
   }
   catch( PDOException $Exception ) 
   {   
      echo "Unable to connect to database.";
      exit;
   }
 
   $requete = "SELECT * FROM Article ORDER BY Date"; 

   $res = $connection->prepare($requete);
   $res->execute();
   //if ($resultat = mysqli_query($connect,$requete)) { 
   date_default_timezone_set('Europe/Paris'); 
      /* fetch le tableau associatif */ 
   $ligneArray = $res->fetchAll(PDO::FETCH_ASSOC);
   foreach ($ligneArray as $ligne) { 
      //$dt_debut = date_create_from_format('Y-m-d H:i:s', ); 
      echo "<h3>".$ligne['Titre']."</h3>"; 
      echo "<h4>Le ".$ligne['Date']."</h4>"; 
      echo "<div style='width:400px'>".$ligne['Commentaire']." </div>";  
      echo "   ";
      echo "<a href='supprArticle.php?Date=".$ligne['Date']."'>Supprimer</a>";
      echo "   ";
      echo "<a href='editArticle.php?Date=".$ligne['Date']."&Titre=".$ligne['Titre']."&Commentaire=".$ligne['Commentaire']."'>Modifier</a>";
      echo "<hr />";
   }
   //} 
   ?> 
   <br /> 
   <a href="formulaireAjout.php" >Aller à la page d'insertion</a> 
</body> 
</html>