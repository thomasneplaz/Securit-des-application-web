# Evaluation Sécurité des applications web

## 1. Auditer http://localhost/about.php avec Lighthouse. Suite à cet audit, proposez des améliorations pour optimiser les différents scores. Des explications techniques sont attendues. (Exemple: Les attributs “alt” ne sont pas présents. cela est nécessaire pour la lecture d’écran. Il faut rajouter dans la balise img un attribut “alt” décrivant brièvement l’image).

### Opportunité

* Il faut que le CSS et le JS le plus important soit passé inline pour ne pas être bloqué par des éléments qui chargent avant. Le CSS et le JS qui se trouvent dans des fichiers sera toujours chargé après ces éléments bloquants ce qui peut être gênant lors de l'affichage.

### Diagnostique

* Le chemin de requête minimum sur l'application possède une longueur trop importante qu'il faudrait réduire ou bien différer pour que le chargement se fasse un peu plus rapidement.

### Accessibilité

* Le contraste entre le fond et le texte n'est pas assez marqué pour les éléments de type "a", il faut changer la couleur de fond ou d'écriture pour que ce soit plus lisible pour les personnes dont la vue peut être moins bonne.
* La balise html ne possède pas d'attribu "lang", il faut en ajouter un afin de facilité la traduction de la page par divers outil de lecture d'écran.

### Bonne pratique

* Il faudrait utiliser le protocole HTTP/2 pour des raisons de sécurité et de performance.
* Il faut ajouter une balise rel="noopener" ou rel="noreferrer" pour tout les liens externes afin de sécuriser l'application et d'améliorer les performances.
* Il manque la balise "<doctype >" sur la page, il faut la rajouter.

### SEO

* Il faut rajouter une balise meta viewport pour optimiser la taille d'affichage de l'écran sur les appareils mobiles.
* Certains texte ont une police inférieur à 12px, ce qui est trop petit pour lire sur mobile. Il faut changer le CSS de ces éléments pour mettre une taille de police plus adaptative et ainsi lisible sur toute les tailles d'écran, cela doit représenter moins de 60% du site.
* Il faut ajouter une balise meta description pour améliorer le référencement de l'application sur les navigateurs.
* Il faut ajouter pour tout les liens une balise "alt" afin que tout les liens possèdent un texte alternatif pour les lecteurs d'écran. Il faut que le texte soit court mais exlique bien l'utilité du lien.
* Il faut permettre aux navigateur de référencer la page, cela se fait dans le fichier robot.txt, il faut permettre aux robots de pouvoir lire la page pour qu'elle puisse ressortir dans les résultats de recherche.

## 2. Réaliser un brute force sur http://localhost avec l’outil Dirbuster pour trouver des fichiers et répertoires cachés. Un des fichiers peut nous apporter beaucoup d’informations sur la configuration de l’application et du serveur, quel est son nom (s’il a été trouvé) ? Expliquer quel est l’objectif de cette attaque. Comment pourrait-on s’en protéger ?

* Le nom du serveur est : Apache 2.0 Handler
* Ce type d'attaque permet de nous donner l'architecture du serveur et comment est organisé l'application sur celui-ci.
* Pour s'en protéger, il faut que le serveur bloque de plus en plus longtemps l'utilisateur qui tente de multiple connexion. Puis il faut qu'au bout d'un certain nombre de fois, l'utilisateur soit bloqué

## 3. Exploiter la faille “Command Injection” sur http://localhost/vulnerabilities/exec/ pour afficher le fichier /etc/passwd et la liste des connexions actives sur le serveur. Décrivez votre procédure ainsi que toute les commandes utilisées (même celles ayant échouées). Expliquer quel pourrait-être l’impact de cette attaque. Comment pourrait-on s’en protéger ? Bonus: Expliquer la différence entre un “bind shell” et un “reverse shell”. Pourquoi est-il plus efficace d’utiliser un reverse shell ?

* J'ai entré dans le champs de texte, la commande 0.0.0.0 | cat ../../../../../../../../../../etc/passwd && w. Ainsi, je l'ai fait pinguer tout de suite sur une IP mais juste derrière j'ai pu lui demander de me donner tout le contenu du fichier passwd. Il va aussi me récupérer tous les utilisateurs qui sont actuellement connecté au serveur avec la commande 
* Cette attaque permet de récupérer tous les mots de passe des utilisateurs sur le serveur.
* Pour se protéger de ce type d'attaque, il est recommander de ne pas avoir de fonctionnalité dans l'application web qui se serve des commandes système. Sinon, il faut bien vérifier que ce qui est envoyé match avec ce qui est attendu pour être exécuté. Il suffit donc de faire une regex avant d'exécuter la commande pour être tranquille.

## 4. Exploiter la faille “File Inclusion” sur http://localhost/vulnerabilities/fi/?page=include.php. Afficher le code source du fichier “http://localhost/vulnerabilities/fi/index.php”. Quelle technique avez-vous utilisée ? Expliquer quel pourrait-être l’impact de cette attaque. Comment pourrait-on s’en protéger ?

* On peut accéder à des pages qui serait normalement protéger par des mots de passe ou réservé aux admins
* Pour s'en protéger, il faut que toute les extensions qui soient passer en paramètre soit échappé et ne puissent pas déclencher des scripts.

## 5. Exploiter la faille “SQL Injection” de manière manuelle (c’est à dire sans SQLMap). Lister toutes les tables présentes sur la base de données. Vous décrirez précisément étapes par étapes comment vous avez procédé. Expliquer quel pourrait-être l’impact de cette attaque. Comment pourrait-on s’en protéger ?

* J'ai commencé par mettre une ' pour voir si le champs était vulnérable. J'ai pu ensuite voir que la requête passait dans l'url, j'ai donc ajouté un ?id=a pour pouvoir passer une autre commande derrière. Ensuite, j'ai donc ajouté mon select pour pouvoir faire passer les valeurs que je souhaitait: UNION SELECT "prénom", "nom";--
* Avec cette attaque, il est possible de remonter tout le schéma de base de données ainsi que les informations qui sont stocké dedans. Il est aussi possible de se connecter sur une application sans avoir d'identifiant ou de mot de passe.
* Pour s'en protéger, il est bon de bien échappé les appostrophe ou autre caractères spéciaux qui pourraient être utilisé pour faire des requêtes.

## 6. Exploiter la faille “SQL Injection (Blind)” avec SQLMap. Vous décrirez précisément quelles commandes vous avez utilisez et pourquoi. Quelle est la spécificité d’une injection SQL en mode “aveugle” ?

* j'ai lancé la commande dans un terminal : python sqlmap.py -u http://localhost/vulnerabilities/sqli_blind/?id=a&Submit=Submit
* En mode blind, on ne voit pas vraiment de changement dans la page car ce qui nous intéresse ce sont les headers des requêtes qui sont faites pour savoir comment est faite la base et ainsi la mapper totalement.

## 7. Exploiter la faille “XSS Reflected”. Modifier le comportement ou l’aspect de la page. Vous décrirez précisément étapes par étapes comment vous avez procédé. Expliquer quel pourrait-être l’impact de cette attaque. Comment pourrait-on s’en protéger ?

* Pour voir comment fonctionnait le champs, je lui ai juste passer ""; pour voir ce qu'il me retournait. Puis suite à la réponse, je lui ai passé <script>alert("hop");</script>, ainsi à l'exécution je fais apparaitre une pop-up
* On peut ainsi faire en sorte que les utilisateur soient redirigé ailleurs ou bien corrompre leur utilisation de l'application (fishing). Elle permet aussi de pouvoir récupérer des informations sur les utilisateurs sans leur consentement ou bien leur envoyer du code malicieux.
* pour s'en protéger, il faut échapper toutes les balises php ou html afin que tout ressorte en texte et ne soit pas interprété par le navigateur.

## 8. Exploiter la faille “XSS Stored”. Modifier le comportement ou l’aspect de la page. Vous décrirez précisément étapes par étapes comment vous avez procédé. Pourquoi une XSS stockées est-elle plus impactante qu’une volatile ?

* j'ai fait la même manipulation que pour la faille XSS Reflected en mettant le code dans le champs de message ainsi à chaque actualisation mon script se déclenche.
* Car elles restent sur la base de données jusqu'à ce qu'elle soit reset ou bien que le code inséré soit manuellement retiré. Il peut donc agir longtemps et sur tout les utilisateur tant qu'il n'est pas détecté.

## 9. (Bonus) Que signifie DIA (ou CIA en anglais) ?

* La DIA est la Defense Intelligence Agency.

## 10. (Bonus) Expliquer la différence entre chiffrer et hasher. Quelle est l’utilité de rajouter un “salt” dans un hash ?

* Chiffrer consiste juste à ajouter une clé pour masquer le véritable texte.
* hasher permet de transformer complètement tous les caractères en une suite d'autre sous une autre base.
* Le fait de rajouter un "sel" dans un hash permet de renforcer sa sécurité car les rainbow tables ne pourront plus décripter le hash du tout
