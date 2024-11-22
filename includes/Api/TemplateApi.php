<?php
namespace TemplateViewer\Api;

use WPResourceHubClient\Api\ClientController;

class TemplateApi {
    /**
     * Récupère tous les templates
     */
    public static function getTemplates() {
        return ClientController::makeRequest('resource-hub/v1/resources');
    }

    /**
     * Récupère un template spécifique
     */
    public static function getTemplate($slug) {
        // peut etre ne pas mettre le /resource-hub/v1/le  " / "
        return ClientController::makeRequest('/resource-hub/v1/' . $slug);
    }
} 