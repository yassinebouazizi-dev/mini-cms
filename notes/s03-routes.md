# Session 03 - Routes, contrôleurs et layout

## Défi

URL produite par route('about') :
http://localhost:8000/a-propos

URL produite par route('posts.show', 'routes-et-controleurs') :
http://localhost:8000/posts/routes-et-controleurs

URL produite par route('posts.archive', 2025) :
http://localhost:8000/posts/archive/2025

Pourquoi /posts/archive/abc et /posts/article-inconnu répondent toutes deux 404, et quelle ligne de code en est responsable dans chaque cas ?
- Pour `/posts/archive/abc` : la contrainte `->whereNumber('year')` dans `routes/web.php` bloque la route au niveau du routeur car `"abc"` n'est pas un nombre. Le contrôleur n'est jamais appelé.
- Pour `/posts/article-inconnu` : l'URL respecte la contrainte regex `[a-z0-9-]+`, la méthode `show($slug)` de `PostController` est bien appelée, mais comme le slug n'existe pas dans le tableau des articles, c'est l'instruction `abort(404);` dans `PostController::show()` qui déclenche l'erreur 404.

Que se passe-t-il si une vue appelle route('posts.show') sans paramètre ?
Laravel lève une exception immédiate (`UrlGenerationException`) indiquant qu'un paramètre obligatoire est manquant :
`Missing required parameter for [Route: posts.show] [URI: posts/{slug}] [Missing parameter: slug].`
