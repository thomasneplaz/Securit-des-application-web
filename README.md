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
Projet de Bilel REHALHA
Test File inclusion en local : n'a pas fonctionné


### sécurisation
explication ...
