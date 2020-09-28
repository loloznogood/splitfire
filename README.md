Bonjour, 

Je vous présente le résultat du test développeur back-end.

Voici les consignes :

-Démarrer votre serveur local
-Créer la base de données splitfire
-Ouvrez le projet et le fichier ".env", faites les modifications nécessaires pour vous connecter à votre 
base de données
-Dans le terminal (pour ma part le terminal VSCode), lancer la commande 'php artisan migrate'
-Insérer les lignes dans la table tweets avec le fichier 'splitfire.sql' se trouvant à la racine du projet
-Dans le terminal, lancer la commande 'php -S localhost:8000 -t public' pour tester vos requêtes

En ce qui concerne les événements (vous pourrez tester les exemples) : 

1er évément :

Méthode de création d'un événement via une requête REST [POST /events]

Doit retourner un ID unique d'événement afin de pouvoir y accéder ultérieurement
Paramètres supportés par cet endpoint :
author (string) : Requis
message (string) : Requis
Vous devrez idéalement extraire une liste de hahstags du message passé en paramètre, afin d'optimiser la 
recherche sur ces derniers (optimisation du stockage et de la recherche)

Dans Postman par exemple, vous pouvez entrer dans l'uri avec la méthode POST :
Pour créer un tweet de Margot avec le message 'je fais un test #ahah' : http://localhost:8000/api/tweets?author
=Thomas&message=Vivement ce soir 23%sport 
(23% désigne le # dans postman)

2ème événement :

Rechercher des événements via une requête REST [GET /events]
Doit retourner une liste d'événements, avec l'ensemble de ses attributs au format JSON
Paramètres possibles de la requête :
author (string) : Récupérer la liste des événements associés à cet utilisateur (optionnel)
hashtags (array) : Récupérer la liste des événements associés aux tags "hashtags" (optionnel)
page (int) : Page de résultat à récupérer (requis, valeur par défaut : 1)
per_page (int) : Nombre de résultats par page (requis, valeur par défaut : 25)

Dans Postman par exemple, vous pouvez entrer dans l'uri avec la méthode GET :

Pour trouver les tweets avec un auteur: http://localhost:8000/api/tweets/author/Margot
Pour trouver les tweets avec un hashtag : http://localhost:8000/api/tweets/hashtag/test
Pour trouver les tweets avec un auteur et un hashtag : http://localhost:8000/api/tweets/author/Margot/hashtag/test
Pour trouver tous les tweets : http://localhost:8000/api/tweets
Pour trouver les tweets avec un id : http://localhost:8000/api/tweets/3

Rajouter '?page=3' pour accéder à la page 3 des résultats, Voici un exemple pour trouver les tweets par 
page : "http://localhost:8000/api/tweets?page=3"

En supplément :
Pour trouver les tweets avec des mots du message : http://localhost:8000/api/tweets/message/demain

N'hésitez pas à me contacter si vous avez des questions ou d'incompréhension : loic.weber12@gmail.com

