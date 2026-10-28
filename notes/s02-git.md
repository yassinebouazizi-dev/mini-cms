# Session 02 - Git et GitHub

Réponses rédigées avec mes propres mots, puis comparées au corrigé de la page.

## 1. Index et commit

Réponse :
- `git add` permet de faire passer un fichier du répertoire de travail (working directory) vers l'index (staging area), préparant ainsi les modifications.
- `git commit` enregistre l'instantané des fichiers de l'index dans le dépôt local (commit).
- `git push` envoie ensuite les commits locaux vers le dépôt distant (GitHub).

## 2. Branche et tag

Réponse :
- Une **branche** est une référence mobile qui avance automatiquement à chaque nouveau commit (ex: `main`).
- Un **tag** (étiquette) est une référence fixe et permanente attachée à un commit précis (ex: `lab-01` ou `lab-01b` qui marquera pour toujours l'état du projet à la fin de la séance).

## 3. Le fichier .env

Réponse :
- Le fichier `.env` ne doit jamais être poussé car il contient des informations spécifiques à la machine locale, la clé secrète de l'application (`APP_KEY`) et potentiellement des identifiants sensibles ou secrets (mots de passe de base de données, clés API).
- Un autre développeur qui clone le projet copie le modèle `.env.example` en `.env` (`cp .env.example .env` ou `copy .env.example .env`), puis génère une nouvelle clé avec `php artisan key:generate`.

## 4. Le dossier vendor/

Réponse :
- Le dossier `vendor/` n'est pas versionné car il est très volumineux et entièrement reproductible.
- La commande `composer install` le reconstruit à l'identique à partir du fichier `composer.lock`, qui fige les versions exactes de chaque paquet installé.

## 5. Git Credential Manager

Réponse :
- Git Credential Manager stocke le jeton d'accès sécurisé dans le Gestionnaire d'identification Windows (entrée `git:https://github.com`).
- Sur un poste de l'université partagé, il faut impérativement supprimer cet identifiant en fin de séance (via `cmdkey /delete:git:https://github.com`) pour empêcher l'étudiant suivant d'accéder au compte GitHub ou de pousser du code en notre nom. Sur un ordinateur personnel, on le conserve.

## 6. Analyse de l'historique (Défi)

Réponse :
- **Nombre de commits depuis `lab-01`** : 5 commits (`Ajouter les notes Git de la session 02`, `Ajouter la page a-propos`, `Ajouter la capture de la page a-propos`, `Ajouter le README du projet`, `Documenter les routes dans le README`).
- **Fichiers modifiés** :
  - `notes/s02-git.md`
  - `routes/web.php`
  - `resources/views/a-propos.blade.php`
  - `screenshots/s02-a-propos.png`
  - `README.md`
- **Sortie de `git tag -n`** : `lab-01` affiche le tag suivi du message du commit associé (`lab-01`).
