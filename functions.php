<?php

// Variável global dos eixos em discussão
$cores_eixos_editor = '
    "F56954", "Vermelho", "F39C12", "Amarelo", "0073B7", "Azul", "00A65A", "Verde", "932AB6", "Roxo", "85144B", "Maroon",   "001F3F", "Azul marinho", "3D9970", "Oliva"
';

$cores_eixos_array = array("#F56954",  "#F39C12",  "#0073B7", "#00A65A",  "#932AB6",  "#85144B", "#001F3F", "#3D9970");


function dadospessoais_scripts() {
    wp_enqueue_script( 'dadospessoais', get_stylesheet_directory_uri() . '/js/dadospessoais.js' , array('jquery') );
}

add_action( 'wp_enqueue_scripts', 'dadospessoais_scripts' );

// Registro do Custom Post Type "Texto em Discussão"
function dados_pessoais_post_types() {

    $labels_texto = array(
        'name'                => _x( 'Textos em debate', 'Textos em debate', 'dadospessoais' ),
        'singular_name'       => _x( 'Texto em debate', 'Texto em debate', 'dadospessoais' ),
        'menu_name'           => __( 'Textos em debate', 'dadospessoais' ),
        'parent_item_colon'   => __( 'Texto pai:', 'dadospessoais' ),
        'all_items'           => __( 'Todos os textos', 'dadospessoais' ),
        'view_item'           => __( 'Ver texto', 'dadospessoais' ),
        'add_new_item'        => __( 'Adicionar texto', 'dadospessoais' ),
        'add_new'             => __( 'Novo', 'dadospessoais' ),
        'edit_item'           => __( 'Editar texto', 'dadospessoais' ),
        'update_item'         => __( 'Atualizar texto', 'dadospessoais' ),
        'search_items'        => __( 'Procurar texto', 'dadospessoais' ),
        'not_found'           => __( 'Não encontrado', 'dadospessoais' ),
        'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'dadospessoais' ),
    );
    $args_texto = array(
        'label'               => __( 'Textos em debate', 'dadospessoais' ),
        'description'         => __( 'Texto a ser posto em debate por parágrafo', 'dadospessoais' ),
        'labels'              => $labels_texto,
        'supports'            => array ('title', 'editor', 'author', 'excerpt', 'trackbacks', 'comments', 'revisions', 'page-attributes'),
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
    register_post_type( 'texto-em-debate', $args_texto );

    $labels_eixo = array(
        'name'                => _x( 'Eixos de debate', 'Eixos de debate', 'dadospessoais' ),
        'singular_name'       => _x( 'Eixo de debate', 'Texto em discussão', 'dadospessoais' ),
        'menu_name'           => __( 'Eixos de debate', 'dadospessoais' ),
        'parent_item_colon'   => __( 'Eixo pai:', 'dadospessoais' ),
        'all_items'           => __( 'Todos os eixos', 'dadospessoais' ),
        'view_item'           => __( 'Ver eixo', 'dadospessoais' ),
        'add_new_item'        => __( 'Adicionar eixo', 'dadospessoais' ),
        'add_new'             => __( 'Novo', 'dadospessoais' ),
        'edit_item'           => __( 'Editar eixo', 'dadospessoais' ),
        'update_item'         => __( 'Atualizar eixo', 'dadospessoais' ),
        'search_items'        => __( 'Procurar eixo', 'dadospessoais' ),
        'not_found'           => __( 'Não encontrado', 'dadospessoais' ),
        'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'dadospessoais' ),
    );
    $args_eixo = array(
        'label'               => __( 'Eixos de debate', 'dadospessoais' ),
        'description'         => __( 'Eixo do debate público', 'dadospessoais' ),
        'labels'              => $labels_eixo,
        'supports'            => array ('title', 'editor', 'author', 'excerpt', 'trackbacks', 'comments', 'revisions', 'page-attributes'),
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
        'query_var' => true,
        'register_meta_box_cb' => 'dadospessoais_eixo_metaboxes'
    );
    register_post_type( 'eixo-de-debate', $args_eixo );

}

add_action( 'init', 'dados_pessoais_post_types', 10, 2);

/**
 * Incluí novas cores no editor visual
 *
 * @param $init
 * @return mixed
 */
function editor_visual_novas_cores( $init ) {

    global $cores_eixos_editor;

    if (get_post_type() ==  "texto-em-debate") {

        $init['textcolor_map'] = '[' . $cores_eixos_editor .']'; // build colour grid default+custom colors
        $init['textcolor_rows'] = 1; // enable 6th row for custom colours in grid
        return $init;
    } else {
        return $init;
    }


}
add_filter('tiny_mce_before_init', 'editor_visual_novas_cores');

/**
 * Inclusão de metaboxes para os eixos
 */
function dadospessoais_eixo_metaboxes() {
    add_meta_box('dadospessoais_cores_eixo', 'Cor para o eixo', 'dadospessoais_cor_eixo_metabox', 'eixo-de-debate', 'normal', 'default');
}

/**
 * Metabox de cor para eixo
 */
function dadospessoais_cor_eixo_metabox() {
    global $post, $cores_eixos_array;

    // Verificação do noncename
    echo '<input type="hidden" name="cormeta_noncename" id="cormeta_noncename" value="' .
        wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

?>
    <script>
        (function($) {
            $(document).ready(function() {
                $('label.color-label').change(function() {
                    $('.color-label span.active').removeClass('active');
                    $(this).find('span.color').addClass('active');
                });
            });
        })(jQuery);
    </script>
    <style>
        span.color {  border:2px solid transparent; display:inline-block; margin:11px; }
        span.color.active { border:2px solid black; }
    </style>
    <?php
    $cor_selecionada = get_post_meta($post->ID, '_cor_eixo', true);
    foreach ($cores_eixos_array as $cor):
        ?>
        <label class="color-label">
            <input type="radio" class="cl_color" name="_cor_eixo" style="display:none" <?php if ($cor_selecionada == $cor) echo 'checked="checked"'; ?> value="<?php echo $cor; ?>"/>
            <span style="background:<?php echo $cor ?>; width:20px; height:20px; " class="color<?php if ($cor_selecionada == $cor) echo ' active"'; ?>"></span>
        </label>
    <?php endforeach;
}

/**
 * Função para salvar a cor selecionada no metabox de seleção de cor do eixo
 *
 * @param $post_id
 * @param $post
 * @return mixed
 */
function dadospessoais_salvar_cor_meta($post_id, $post) {
    // Verificação do nonce
    if ( !wp_verify_nonce( $_POST['cormeta_noncename'], plugin_basename(__FILE__) )) {
        return $post->ID;
    }

    // O usuário tem permissão de edição de página?
    if ( !current_user_can( 'edit_page', $post->ID ))
        return $post->ID;

    $cor_eixo = $_POST['_cor_eixo'];

    update_post_meta($post->ID, '_cor_eixo', $cor_eixo);
}

add_action('save_post', 'dadospessoais_salvar_cor_meta', 1, 2); // save the custom fields


add_action('the_content', 'dadospessoais_parse_headers');

function dadospessoais_parse_headers($content) {
    if(get_post_type() == "texto-em-debate") {
        return preg_replace_callback('/(<h([1-6]{1})([^>]*)>)(.*)<\/h\2>/msuU', 'dadospessoais_parse_head', $content);
    } else {
        return $content;
    }
}

function dadospessoais_parse_head($matches) {

    return "<h{$matches[2]} {$matches[3]} id='" . str_replace('--','-', str_replace('8211','', dadospessoais_slugfy($matches[4]))) . "'>{$matches[4]}</h{$matches[2]}>";

}

/**
 * Obtem o índice (table of contents) de um conteúdo html passado
 *
 * @param $content
 * @return string
 */
function dadospessoais_get_toc($content) {
    $matches = array();

    $output = "";

    if ( preg_match_all('/(<h([1-6]{1})[^>]*)>(.*)<\/h\2>/msuU', $content, $matches, PREG_SET_ORDER) ) {

        $output .= "<ul>";
        $level = 1;

        foreach($matches as $match) {

            $item_toc = '<li><a href="#' . dadospessoais_slugfy($match[3]) . '">' . $match[3] . '</a></li>';

            if ($match[2] > $level) {

                for(; $level < $match[2]; $level++) {
                    $output .= "<li><ul>";
                    $output .= $item_toc;
                }
            } elseif ($match[2] < $level) {
                for (; $level > $match[2]; $level--){
                    $output .= "</li></ul>";
                }

                $output .= $item_toc;

            }
            else {
                $output .= $item_toc;
            }
        }

        $output .= "</ul>";

    }

    return $output;
}

/**
 * Gera slug de um texto aleatório
 *
 * @param $text
 * @return mixed|string
 */
function dadospessoais_slugfy($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text))
    {
        return 'n-a';
    }

    return $text;
}
