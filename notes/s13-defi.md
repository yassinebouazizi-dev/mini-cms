# Session 13 - Défi

/api/posts/3 affiche tags avec des noms : oui
/api/posts ne contient aucun body, /api/posts/3 en contient un : oui
Aucune LazyLoadingViolationException : oui

Pourquoi ne pas envoyer body dans la liste, et qui en profite ?
La liste reste légère : moins d'octets à transmettre, une réponse plus rapide sur un téléphone. Le client ne charge le contenu complet que lorsque la personne ouvre un article.

Un brouillon renvoie 403. Quel avantage aurait un 404 pour un brouillon ?
Un 404 ne révèle pas qu'un brouillon existe avec ce numéro, alors que 403 confirme son existence. Le site fait le même choix que l'API (403, session 12) : une seule règle, dans PostPolicy, sert aux deux portes.
