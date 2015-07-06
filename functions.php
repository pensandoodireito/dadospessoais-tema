<?php

// Variável global dos eixos em discussão
$cores_eixos_editor = '
    "FF1212", "Vermelho A", "984444", "Vermelho B", "FF7112", "Laranja A", "FFA012",  "Laranja A", "986644", "Laranja B", "FFFF12", "Amarelo A", "987644", "Amarelo B", "988744", "Amarelo C", "B2E710", "Verde A", "0FD00F", "Verde B", "989844", "Verde C", "7C9040", "Verde D", "3C873C", "Verde E", "0F9FD0", "Azul A", "0F5FD0",  "Azul B", "2F0FD0", "Azul C", "3C7587", "Azul D", "3C5C87", "Azul E", "8F0FD0", "Violeta A", "493C87", "Violeta B", "6E3C87", "Violeta C", "DB0F86", "Rosa A", "8B3E6B", "Rosa B"
';


$cores_eixos_array = array( "#FF1212",
                            "#984444",
                            "#FF7112",
                            "#FFA012",
                            "#986644",
                            "#FFFF12",
                            "#987644",
                            "#988744",
                            "#B2E710",
                            "#0FD00F",
                            "#989844",
                            "#7C9040",
                            "#3C873C",
                            "#0F9FD0",
                            "#0F5FD0",
                            "#2F0FD0",
                            "#3C7587",
                            "#3C5C87",
                            "#8F0FD0",
                            "#493C87",
                            "#6E3C87",
                            "#DB0F86",
                            "#8B3E6B" );


add_action( 'wp_enqueue_scripts', 'dadospessoais_scripts' );
function dadospessoais_scripts() {
    wp_enqueue_script( 'dadospessoais', get_stylesheet_directory_uri() . '/js/dadospessoais.js' , array('jquery') );

    $var_plataforma = array();
    $var_plataforma['signup_url'] = wp_registration_url();
    $var_plataforma['login_url'] = wp_login_url();
    $var_plataforma['configs'] = array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'ajaxgif' => get_template_directory_uri() . '/images/ajax-loader.gif'
    );
    wp_localize_script( 'dadospessoais', 'dadosPessoais', $var_plataforma );
}


add_action( 'admin_enqueue_scripts', 'dadospessoais_admin_scripts');
function dadospessoais_admin_scripts() {
    wp_enqueue_script( 'dadospessoais', get_stylesheet_directory_uri() . '/js/dadospessoais-admin.js' , array('jquery') );
    $var_plataforma = array();
    $var_plataforma['ajaxurl'] = admin_url('admin-ajax.php');
    $var_plataforma['ajaxgif'] = get_template_directory_uri() . '/images/ajax-loader.gif';
    wp_localize_script( 'dadospessoais', 'dadosPessoais', $var_plataforma );
}


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
        $init['textcolor_rows'] = 3; // enable 6th row for custom colours in grid
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
    if (!isset($_POST['cormeta_noncename'])) {
        return $post->ID;
    }

    // Verificação do nonce
    if ( !wp_verify_nonce( $_POST['cormeta_noncename'], plugin_basename(__FILE__) )) {
        return $post->ID;
    }

    // O usuário tem permissão de edição de página?
    if ( !current_user_can( 'edit_page', $post->ID )) {
        return $post->ID;
    }

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

/**
 * Função para recuperar post a partir do seu slug
 *
 * @param $page_slug
 * @param string $output
 * @param string $post_type
 * @return null|WP_Post
 */
function dadospessoais_get_by_slug($page_slug, $output = OBJECT, $post_type = 'page' ) {
    global $wpdb;
    $page = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s", $page_slug, $post_type ) );
    if ( $page )
        return get_post($page, $output);
    return null;
}

/**
 * Função para incluir metas no header do dadospessoais
 */
function dadospessoais_meta_headers() {
?>
    <meta name="google-site-verification" content="BsLDGuqe43xz3qpURHjNWLVhQ7qI-Ps8VX2DB1lEbxA" />
<?php
}

add_action( 'wp_head', 'dadospessoais_meta_headers' );

/**
 * Função para obter o link da página de informação em inglês
 */
function dadospessoais_get_english_information_link() {
    $page_english = dadospessoais_get_by_slug('english-information');
    return get_permalink($page_english);
}


/**
 * Obtem o objeto page do anteprojeto
 */
function dadospessoais_get_anteprojeto_page() {
    return dadospessoais_get_by_slug('anteprojeto-de-lei-para-a-protecao-de-dados-pessoais', OBJECT, 'texto-em-debate');
}


/**
 * Adicionando MetaBoxes na área de admin para gerenciar os PDFs enviados como contribuições
 */
add_action( 'add_meta_boxes', 'dadospessoais_exibicao_metabox' );
function dadospessoais_exibicao_metabox()
{
  add_meta_box( 'contribuicoes-pdf', 'Contribuições em PDF', 'dadospessoais_contribuicoes_render', 'texto-em-debate', 'side', 'core' );
}

function dadospessoais_contribuicoes_render($post)
{
  $pdf_contribution_list = get_post_meta($post->ID, 'pdf_contribution_list', true);

  $counter = 1;
  foreach ($pdf_contribution_list as $key=> $pdf_contribution) {
    ?>
    <p id="delete_pdf_key_<?php echo $key; ?>">
      <b>Contribuição <?php echo $counter; ?></b>
      <input type="button" class="ed_button button button-small" onclick="deletar_pdf(<?php echo $key; ?>, <?php echo $post->ID; ?>)" value="Deletar"/><br/>
      Autor:<br/>
      <input type="text" value = "<?php echo $pdf_contribution['author']; ?>" id="autor_contribuicao_<?php echo $key ?>"/><br/>
      Email:<br/>
      <input type="email" value = "<?php echo $pdf_contribution['email']; ?>" id="email_contribuicao_<?php echo $key ?>"/>
      <input type="button" class="ed_button button button-small" value="OK" onclick="altera_autor_pdf(<?php echo $key; ?>, <?php echo $post->ID; ?>, jQuery('#autor_contribuicao_<?php echo $key; ?>').val(), jQuery('#email_contribuicao_<?php echo $key; ?>').val())"></br>
      <a href="<?php echo $pdf_contribution['pdf_url']; ?>">Contribuição</a>
    </p>
    <hr/>
    <?php
    $counter++;
  }
}

function dadospessoais_remove_pdf_callback(){
    $pdf_contribution_list = get_post_meta($_POST['post_ID'], 'pdf_contribution_list', true);
    $base_upload_path = wp_upload_dir();

    unlink($base_upload_path['basedir'] . explode($base_upload_path['baseurl'],$pdf_contribution_list[$_POST['chave']]['pdf_url'])[1]);
    unset($pdf_contribution_list[$_POST['chave']]);
    update_post_meta($_POST['post_ID'],'pdf_contribution_list',$pdf_contribution_list);
}
add_action('wp_ajax_dadospessoais_remove_pdf', 'dadospessoais_remove_pdf_callback');

function dadospessoais_altera_autor_pdf_callback(){
  $pdf_contribution_list = get_post_meta($_POST['post_ID'], 'pdf_contribution_list', true);
  $pdf_contribution_list[$_POST['chave']]['author'] = $_POST['novo_autor'];
  $pdf_contribution_list[$_POST['chave']]['email'] = $_POST['novo_email'];
  update_post_meta($_POST['post_ID'],'pdf_contribution_list',$pdf_contribution_list);
}
add_action('wp_ajax_dadospessoais_altera_autor_pdf', 'dadospessoais_altera_autor_pdf_callback');
