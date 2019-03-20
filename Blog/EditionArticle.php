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
 
$requete = "UPDATE Article SET Titre = '".htmlentities(addslashes($_POST['Titre']), ENT_QUOTES)."', Commentaire = '".htmlentities (addslashes($_POST['Commentaire']), ENT_QUOTES)."' WHERE Date = '".$_POST['Date']."'"; 
$res = $connection->prepare($requete);
$res->execute();
/* Fermeture de la connexion */ 
$connection = null;
 
if ($identifiant != 0) { 
   echo "<br /> Edition du commentaire réussi.<br /><br />"; 
} 
else { 
   echo "<br />Le commentaire n'a pas pu être édité.<br /><br />"; 
} 
?> 
<a href="blog.php" >retour à la page des articles</a> 
</body> 
</html>