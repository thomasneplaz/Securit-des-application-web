# Evaluation D25
## Audit SEO et réseau dégradé
Pour le site slash-group :

### Performance : 
* le texte ne doit pas disparaître quand la police se charge
* Retirer les éléments qui bloquent le chargement général de la page pour se charger eux même
* Retirer les morceaux css inutilisés et le minifier
* Eviter les formats d'image png et jpeg pour préférer des formats plus récent et réduire la taille des images pour qu'elles conviennent à la page sans être trop lourdes
* Faire charger en priorité ce qui est tout de suite visible et ne faire charger que le reste une fois que les informations les plus importantes ont été chargé

### Accessibilité :
* Ajouter des textes alternatifs pour les boutons, les images et les liens
* Modifier un peu le contraste entre le fond et le texte pour certain éléments
* Mettre des ids uniques pour les éléments, sinon utiliser des classes
* Permettre aux utilisateurs de redéfinir le zoom de la page a lieu de le bloquer 

### Bonne pratique :
* Utiliser le protocole HTTP/2 pour tous les éléments 
* Faire attention quant à l'emploi de librairie JS qui peuvent contenir des vulnérabilités (JQuery et JQueryUI)
* Ne pas faire apparaître les erreurs du navigateur dans la console

### SEO:
* Ajouter une balise meta description dans le head

### Progressive Web App :
* Rien n'a été fait sur ce point pour la mettre en place


## Faille
### exploitation
Projet de Bilel REHAHLA

Test File inclusion en local : n'a pas fonctionné


### sécurisation
* Pour sécuriser mon application, j'ai utilisé des prepare pour toutes les requètes de CRUD
* Dans les requête je me suis servie de htmlentities pour échapper les caractères et balise
* Je n'ai pas de connexion pour le moment, je ne peux donc pas sécursé la connexion, le temps de connexion, la récupération de mot de passe avec un token unique, ou bien le hachage des mots de passe avec un salage

### A2 - Broken Auht / Session Management Administrative portal
* Pour entrer sur la page blqué en admin, il faut juste faire passer la variable dans l'url à 1

### A1 - Injection / PHP code injection
* Pour utiliser cette faille, il faut changer le contenu du message dans l'url pour ajouter à la place : ""; + toute autre commande php telle que readfile("../../../../../../etc/passwd") pour pouvoir avoir la liste de tout les mots de passe

### A1 - Injection / SQL injection - Stored (blog)
* Pour se servir de l'injection sql dans ce cas, il faut que l'on passe : hop',(SELECT version()))-- , ainsi on peut avoir la version de la base, puis en remplaçant version par database, on peut avoir le nom de la base et de là on peut rechercher toute les informations sur la base.

### A1 - Injection / SQL injection - (POST/SELECT)
...