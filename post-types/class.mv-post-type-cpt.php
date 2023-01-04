<?php 
if(!class_exists('AA_Post_type_Post_Type')){
    class AA_Post_type_Post_Type{
        function __construct(){
            add_action('init', array($this, 'create_post_type'));
        }
        public function create_post_type(){
            register_post_type(
                'mv-post-type',
                array(
                    'label'         => 'post-type',
                    'description'   => 'post-types',
                    'labels'        => array(
                        'name'      =>'post-types',
                        'singular_name' =>  'post-type'
                    ),
                    'public'    => true,
                    'supports'  => array('title','editor','thumbnail'),
                    'hierarchical'  => false,
                    'show_ui'       => true,
                    'show_in_menu'  => true,
                    'menu_position' => 5,
                    'show_in_admin_bar' => true,
                    'show_in_nav_menus' => true,
                    'can_export'    => true,
                    'has_archive'   => false,
                    'exclude_from_search'   => false,
                    'publicly_queryable'    => true,
                    'show_in_rest'  => true,
                    'menu_icon' => 'dashicons-images-alt2'
                              
                )
            );
        }

    }
}