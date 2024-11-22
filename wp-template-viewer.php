<?php
/**
 * Plugin Name: WP Template Viewer
 * Description: Affiche les templates depuis l'API Resource Hub
 * Version: 1.0.0
 * Author: Votre Nom
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
    exit;
}

// Vérifier que le plugin Resource Hub Client est actif
if (!class_exists('WPResourceHubClient\Api\ClientController')) {
    add_action('admin_notices', function() {
        ?>
        <div class="notice notice-error">
            <p>Le plugin "WP Template Viewer" nécessite le plugin "WP Resource Hub Client". Veuillez l'installer et l'activer.</p>
        </div>
        <?php
    });
    return;
}

require_once plugin_dir_path(__FILE__) . 'includes/Plugin.php';

// Initialiser le plugin
add_action('plugins_loaded', ['TemplateViewer\Plugin', 'init']); 