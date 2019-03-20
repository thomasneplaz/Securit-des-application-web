<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
   <head> 
      <title>Blog</title> 
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   </head> 
<body> 
   <h2>Nouvel article</h2> 
   <form action="insertionArticle.php" method="POST" enctype="multipart/form-data"> 
      <p>Titre de l'article: <input type="text" name="titre" /></p> 
      <p>Commentaire: <br /><textarea name="commentaire" rows="10" cols="50"></textarea></p>  
      <input type="submit" name="ok" value="Envoyer"> 
   </form> 
   <br /> 
   <a href="blog.php" >VISITEZ LE BLOG</a> 
</body> 
</html>