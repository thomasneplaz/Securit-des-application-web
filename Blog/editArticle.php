<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
   <head> 
      <title>Blog</title> 
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   </head> 
<body> 
<form action="EditionArticle.php" method="POST" enctype="multipart/form-data"> 
      <p>Titre de l'article: <input type="text" name="Titre" value='<?php echo $_GET['Titre'];?>'/></p> 
      <p>Commentaire: <br /><textarea name="Commentaire" rows="10" cols="50"><?php echo $_GET['Commentaire'];?></textarea></p>  
      <input type="text" name="Date" value='<?php echo $_GET['Date'];?>' readonly>
      <input type="submit" name="ok" value="Envoyer"> 
   </form> 
</body> 
</html>