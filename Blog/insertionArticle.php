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
 
$requete = "INSERT INTO Article (Titre, Date, Commentaire, Photo) VALUES ('".htmlentities(addslashes($_POST['titre']), ENT_QUOTES)."','".date("Y-m-d H:i:s")."','".htmlentities (addslashes($_POST['commentaire']), ENT_QUOTES)."', '')"; 
$resultat = mysqli_query($connect,$requete); 
$identifiant = mysqli_insert_id($connect); 
/* Fermeture de la connexion */ 
mysqli_close($connect); 
 
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