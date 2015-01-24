<?php
get_header(); ?>
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
