# Evaluation Sécurité des applications web

## 1. Auditer http://localhost/about.php avec Lighthouse. Suite à cet audit, proposez des améliorations pour optimiser les différents scores. Des explications techniques sont attendues. (Exemple: Les attributs “alt” ne sont pas présents. cela est nécessaire pour la lecture d’écran. Il faut rajouter dans la balise img un attribut “alt” décrivant brièvement l’image).


## 2. Réaliser un brute force sur http://localhost avec l’outil Dirbuster pour trouver des fichiers et répertoires cachés. Un des fichiers peut nous apporter beaucoup d’informations sur la configuration de l’application et du serveur, quel est son nom (s’il a été trouvé) ? Expliquer quel est l’objectif de cette attaque. Comment pourrait-on s’en protéger ?

## 3. Exploiter la faille “Command Injection” sur http://localhost/vulnerabilities/exec/ pour afficher le fichier /etc/passwd et la liste des connexions actives sur le serveur. Décrivez votre procédure ainsi que toute les commandes utilisées (même celles ayant échouées). Expliquer quel pourrait-être l’impact de cette attaque. Comment pourrait-on s’en protéger ? Bonus: Expliquer la différence entre un “bind shell” et un “reverse shell”. Pourquoi est-il plus efficace d’utiliser un reverse shell ?

## 4. Exploiter la faille “File Inclusion” sur http://localhost/vulnerabilities/fi/?page=include.php. Afficher le code source du fichier “http://localhost/vulnerabilities/fi/index.php”. Quelle technique avez-vous utilisée ? Expliquer quel pourrait-être l’impact de cette attaque. Comment pourrait-on s’en protéger ?

## 5. Exploiter la faille “SQL Injection” de manière manuelle (c’est à dire sans SQLMap). Lister toutes les tables présentes sur la base de données. Vous décrirez précisément étapes par étapes comment vous avez procédé. Expliquer quel pourrait-être l’impact de cette attaque. Comment pourrait-on s’en protéger ?

## 6. Exploiter la faille “SQL Injection (Blind)” avec SQLMap. Vous décrirez précisément quelles commandes vous avez utilisez et pourquoi. Quelle est la spécificité d’une injection SQL en mode “aveugle” ?

## 7. Exploiter la faille “XSS Reflected”. Modifier le comportement ou l’aspect de la page. Vous décrirez précisément étapes par étapes comment vous avez procédé. Expliquer quel pourrait-être l’impact de cette attaque. Comment pourrait-on s’en protéger ?

## 8. Exploiter la faille “XSS Stored”. Modifier le comportement ou l’aspect de la page. Vous décrirez précisément étapes par étapes comment vous avez procédé. Pourquoi une XSS stockées est-elle plus impactante qu’une volatile ?

## 9. (Bonus) Que signifie DIA (ou CIA en anglais) ?

## 10. (Bonus) Expliquer la différence entre chiffrer et hasher. Quelle est l’utilité de rajouter un “salt” dans un hash ?