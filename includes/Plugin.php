<?php
namespace TemplateViewer;

class Plugin {
    public static function init() {
        require_once plugin_dir_path(__FILE__) . 'Api/TemplateApi.php';
        require_once plugin_dir_path(__FILE__) . 'Admin/TemplateManager.php';

        // Initialiser l'interface d'administration
        Admin\TemplateManager::init();
    }
} 