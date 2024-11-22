# WP Template Viewer

Plugin de visualisation de templates pour WordPress.
Ce plugin sert d'exemple d'intégration pour ResourceHubClient.

## Fonctionnalités
- Visualisation de templates
- Support pour les templates Gutenberg
- Compatibilité avec les thèmes standards
- Possibilité d'ajouter des styles personnalisés

## Utilisation de ClientController::makeRequest

Le `ClientController::makeRequest` est utilisé pour effectuer des requêtes vers ResourceHub.

### Syntaxe de base
```php
$response = ClientController::makeRequest('GET', '/endpoint', [
    'param1' => 'valeur1'
]);
```

### Exemple complet
```php
$response = ClientController::makeRequest(
    'POST',                 // Méthode HTTP
    '/chemin/endpoint',     // Chemin de l'endpoint
    [                      // Paramètres
        'param1' => 'valeur1',
        'param2' => 'valeur2'
    ],
    [                      // Headers (optionnel)
        'Custom-Header' => 'Valeur'
    ]
);
```

### Paramètres

| Paramètre | Description |
|-----------|-------------|
| `$method` | Méthode HTTP (GET, POST, PUT, DELETE) |
| `$endpoint` | Chemin de l'endpoint sur ResourceHub |
| `$params` | Tableau des paramètres de la requête |
| `$headers` | Headers HTTP additionnels (optionnel) |

### Retour

La méthode retourne un objet `Response` contenant :

- `status` : Code HTTP de la réponse
- `data` : Données de la réponse
- `headers` : Headers de la réponse

