# Séance 01 - Cycle de vie d'une requête vers `/heure`

## Cheminement d'une requête HTTP `GET http://localhost:8000/heure`

1. **Navigateur** : Envoie une requête HTTP `GET` vers l'URL `/heure`.
2. **`public/index.php`** :
   - Unique point d'entrée web (pattern Front Controller).
   - Charge l'autoloader Composer via `require vendor/autoload.php`.
   - Charge et amorce l'application via `require bootstrap/app.php`.
   - Capture la requête entrante avec `Request::capture()` et la transmet au gestionnaire HTTP de l'application via `$app->handleRequest(...)`.
3. **`bootstrap/app.php`** :
   - Initialise le conteneur et configure l'application (routage, middlewares globaux et gestion des exceptions).
   - Indique à Laravel que les routes web sont définies dans `routes/web.php`.
4. **`routes/web.php`** :
   - Le routeur recherche une route correspondant à la méthode `GET` et au chemin `/heure`.
   - Il trouve la définition `Route::get('/heure', ...)`.
5. **Closure de la route** :
   - Exécute le code PHP associé à la route.
   - Calcule l'heure (`now()->format('H:i')`) et la date (`now()->format('d/m/Y')`) selon le fuseau horaire configuré (`Africa/Tunis`).
   - Appelle le helper `view('heure', ['heure' => ..., 'date' => ...])`.
6. **Moteur Blade & Vue (`resources/views/heure.blade.php`)** :
   - Localise le template Blade.
   - Si besoin, compile le template Blade en PHP brut dans `storage/framework/views/`.
   - Échappe et injecte les variables `$heure` et `$date` à la place des balises `{{ $heure }}` et `{{ $date }}` via `htmlspecialchars`.
7. **Réponse HTTP (`Illuminate\Http\Response`)** :
   - Génère une réponse HTTP contenant le code de statut (200 OK), les en-têtes (Content-Type: text/html) et le corps HTML compilé.
   - Renvoie cette réponse au navigateur qui affiche la page.
