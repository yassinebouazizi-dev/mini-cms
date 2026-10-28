<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date et Heure - Mini-CMS</title>
    <style>
        body {
            font-family: system-ui, sans-serif;
            max-width: 40rem;
            margin: 3rem auto;
            padding: 0 1rem;
            color: #1f2937;
            line-height: 1.6;
        }
        h1 { color: #e6291b; }
        .time-box {
            background-color: #f3f4f6;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-top: 1.5rem;
            border-left: 4px solid #e6291b;
        }
        dt { font-weight: 600; color: #4b5563; }
        dd { margin: 0 0 1rem 0; font-size: 1.25rem; font-weight: 500; }
    </style>
</head>
<body>
    <h1>Horloge Mini-CMS</h1>
    <p>Heure locale du serveur (Fuseau : Africa/Tunis) :</p>
    <div class="time-box">
        <dl>
            <dt>Heure</dt>
            <dd>{{ $heure }}</dd>
            <dt>Date</dt>
            <dd>{{ $date }}</dd>
        </dl>
    </div>
</body>
</html>
