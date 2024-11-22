<?php
namespace TemplateViewer\Admin;

use TemplateViewer\Api\TemplateApi;

class TemplateManager {
    public static function init() {
        add_action('admin_menu', [self::class, 'addMenuPage']);
    }

    public static function addMenuPage() {
        add_menu_page(
            'Templates',
            'Templates',
            'manage_options',
            'template-viewer',
            [self::class, 'renderPage'],
            'dashicons-layout',
            30
        );
    }

    public static function renderPage() {
        $templates = TemplateApi::getTemplates();
 
        ?>
        <pre><?php var_dump($templates); ?></pre>
        <div class="wrap">
            <h1>Templates disponibles</h1>

            <?php if (is_wp_error($templates)) : ?>
                <div class="notice notice-error">
                    <p><?php echo esc_html($templates->get_error_message()); ?></p>
                </div>
            <?php else : ?>
                <div class="template-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
                    <?php foreach ($templates as $template) : ?>
                        <div class="template-card" style="border: 1px solid #ddd; padding: 15px; background: white;">
                            <?php if (!empty($template['thumbnail'])) : ?>
                                <img src="<?php echo esc_url($template['thumbnail']); ?>" 
                                     style="width: 100%; height: auto; margin-bottom: 10px;">
                            <?php endif; ?>
                            
                            <h3><?php echo esc_html($template['title']); ?></h3>
                            
                            <?php if (!empty($template['description'])) : ?>
                                <p><?php echo esc_html($template['description']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($template['download_url'])) : ?>
                                <a href="<?php echo esc_url($template['download_url']); ?>" 
                                   class="button button-primary" 
                                   target="_blank">
                                    Télécharger
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
} 