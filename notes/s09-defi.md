# Session 09 - Défi

Le bandeau s'affiche sur toutes les pages quand SITE_READ_ONLY=true : oui
Le bandeau disparaît quand SITE_READ_ONLY=false : oui
La page Article introuvable propose au plus trois articles publiés, sans brouillon : oui
Aucune LazyLoadingViolationException sur /posts/999 : oui
Les deux nouveaux tests passent et php artisan test est vert : oui

Pourquoi le bandeau est-il dans le layout et pas dans chaque vue ?
Le layout entoure toutes les pages, y compris la page d'erreur : un seul bloc couvre tout le site, et une correction se fait à un seul endroit.

Pourquoi le test du bandeau n'a-t-il pas besoin de modifier .env ?
config(['site.read_only' => true]) change la valeur pour ce test seulement ; phpunit.xml garde false pour tous les autres, donc .env n'a pas à changer.
