<?php
get_header(); 

if (isset($_FILES['pdf_contribution'])) {

    $upload_dir = wp_upload_dir();
    $file_name = md5($_FILES['pdf_contribution']['name'].$_FILES['pdf_contribution']['size']) . '.pdf';
    
    move_uploaded_file($_FILES['pdf_contribution']['tmp_name'], $upload_dir['path'] . '/' . $file_name);
    
    add_post_meta(get_the_ID(), 'pdf_contribution_list', 
            array(  'author' => 'teste',
                    'pdf_url' => $upload_dir['url'] . '/' . $file_name ) );
    
}
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php get_template_part("menu", "horizontal"); ?>
        </div>
    </div>
    <?php
        // Start the Loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'content', 'texto-em-debate' );

        endwhile;
    ?>
</div>
<?php
get_footer();
