<?php
get_header(); ?>
<div>teste</div>
    
    <?php
        // Start the Loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'content', 'texto-em-discussao' );

        endwhile;
    ?>

<?php
get_footer();
