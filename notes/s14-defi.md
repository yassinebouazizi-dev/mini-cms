# Session 14 - Défi

Connexion enregistre le jeton toute seule : oui
Créer un article répond 201 sans copier le jeton : oui
Le fichier exporté ne contient aucun jeton : oui

Le dépôt est public. Que risquez-vous si le fichier exporté contient un jeton, et comment l'annuler ?
Si le jeton est dans le dépôt public, n'importe qui peut l'utiliser pour se connecter à ma place et créer, modifier ou supprimer des articles, car un jeton Sanctum n'expire pas par défaut. Pour l'annuler, il faut d'abord le révoquer en base (via POST /api/logout ou en supprimant la ligne dans personal_access_tokens), puis le retirer du fichier exporté et faire un nouveau commit.

Pourquoi les écritures de l'API passent-elles par les Form Requests et PostPolicy plutôt que par des règles écrites dans Api\PostController ?
Pour ne pas dupliquer les règles entre le site et l'API : StorePostRequest, UpdatePostRequest et PostPolicy gardent la validation (avec les messages en français) et les permissions au même endroit, et le contrôleur API reste simple.
