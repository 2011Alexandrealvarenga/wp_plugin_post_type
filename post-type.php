<?php
/**
 * Plugin name: Post Type
 * Plugin URI: https://wordpress.org/plugins/custom-css-js/
 * Description: My plygin´s description
 * Version: 1.0
 * Author: Alexandre Alvarenga
 * Author URI: 
 * License: GPL2
 * Text Domain: 
 * Domain Path: 
 */

//  Para nao ser acessado diretamente
 if(!defined ('ABSPATH')){
    exit;
 }

 if(!class_exists('AA_Post_type')){
    class AA_Post_type{
        function __construct(){
            $this->define_constants();

            // chama o post type
            require_once(AA_Post_type_PATH . 'post-types/class.mv-post-type-cpt.php');
            $AA_Post_type_Post_Type = new AA_Post_type_Post_Type();
        }
        public function define_constants(){
            define('AA_Post_type_PATH', plugin_dir_path(__FILE__));
            define('AA_Post_type_URL', plugin_dir_url(__FILE__));
            define('AA_Post_type_VERSION','1.0.0');
        }
        public static function activate(){
            update_option('rewrite_rules','');
        }
        public static function deactivate(){
            flush_rewrite_rules();
            unregister_post_type('mv-post-type');
        }
        public static function uninstall(){

        }
    }
 }

 if(class_exists('AA_Post_type')){
    register_activation_hook(__FILE__, array('AA_Post_type','activate'));
    register_deactivation_hook(__FILE__, array('AA_Post_type','deactivate'));
    register_uninstall_hook(__FILE__, array('AA_Post_type','uninstall'));
    $aa_post_type = new AA_Post_type();
 }