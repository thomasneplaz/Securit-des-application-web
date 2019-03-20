<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
   <head> 
      <title>Blog</title> 
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   </head> 
<body> 
<?php 
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
 
$requete = "INSERT INTO Article (Titre, Date, Commentaire, Photo) VALUES ('".htmlentities(addslashes( $_POST['titre'] ), ENT_QUOTES)."','".date("Y-m-d H:i:s")."','".htmlentities (addslashes( $_POST['commentaire'] ), ENT_QUOTES)."', '')"; 
$res = $connection->prepare($requete);
$res->execute();
//$identifiant = mysqli_insert_id($connect); 
/* Fermeture de la connexion */ 
$connection = null;
 
if ($identifiant != 0) { 
   echo "<br />Ajout du commentaire réussi.<br /><br />"; 
} 
else { 
   echo "<br />Le commentaire n'a pas pu être ajouté.<br /><br />"; 
} 
?> 
<a href="formulaireAjout.php" >retour à la page d'ajout d'articles</a> 
</body> 
</html>