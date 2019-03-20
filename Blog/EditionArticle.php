<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
   <head> 
      <title>Blog</title> 
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   </head> 
<body> 
<?php 
$connect = mysqli_connect("localhost", "root", "test", "blog"); 

/* Vérification de la connexion */ 
if (!$connect) { 
   echo "Échec de la connexion : ".mysqli_connect_error(); 
   exit(); 
} 
 
$requete = "UPDATE Article SET Titre = '".htmlentities(addslashes($_POST['Titre']), ENT_QUOTES)."', Commentaire = '".htmlentities (addslashes($_POST['Commentaire']), ENT_QUOTES)."' WHERE Date = '".$_POST['Date']."'"; 
$resultat = mysqli_query($connect,$requete); 
$identifiant = mysqli_insert_id($connect); 
/* Fermeture de la connexion */ 
mysqli_close($connect); 
 
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