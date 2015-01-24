<?php
// Register Custom Post Type
function texto_discussao_post_type() {

    $labels = array(
        'name'                => _x( 'Textos em discussão', 'Textos em discussão', 'texto-discussao' ),
        'singular_name'       => _x( 'Texto em discussão', 'Texto em discussão', 'texto-discussao' ),
        'menu_name'           => __( 'Textos em discussão', 'texto-discussao' ),
        'parent_item_colon'   => __( 'Texto pai:', 'texto-discussao' ),
        'all_items'           => __( 'Todos os textos', 'texto-discussao' ),
        'view_item'           => __( 'Ver texto', 'texto-discussao' ),
        'add_new_item'        => __( 'Adicionar texto', 'texto-discussao' ),
        'add_new'             => __( 'Novo', 'texto-discussao' ),
        'edit_item'           => __( 'Editar texto', 'texto-discussao' ),
        'update_item'         => __( 'Atualizar texto', 'texto-discussao' ),
        'search_items'        => __( 'Procurar texto', 'texto-discussao' ),
        'not_found'           => __( 'Não encontrado', 'texto-discussao' ),
        'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'texto-discussao' ),
    );
    $args = array(
        'label'               => __( 'Textos em discussão', 'texto-discussao' ),
        'description'         => __( 'Texto a ser posto em discussão por parágrafo', 'texto-discussao' ),
        'labels'              => $labels,
        'supports'            => array( ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'rewrite'             => true,
        'permalink_epmask' => 'EP_PERMALINK ',
        'query_var' => true
    );
    register_post_type( 'texto-em-discussao', $args );

}

// Hook into the 'init' action
add_action( 'init', 'texto_discussao_post_type', 0 );