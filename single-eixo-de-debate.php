<?php
get_header(); ?>
    <div class="container">
        <div class="row">
            <?php get_template_part('menu', 'horizontal'); ?>
        </div>
        <?php
        // Start the Loop.
        while (have_posts()) : the_post();
            // Include the page content template.
            get_template_part('content', 'eixo-de-debate');
            comment_form(array(
                'logged_in_as'         => '<p class="red">A sua participação pode ser através desse campo de comentários para opinar sobre os aspectos do Anteprojeto dentro desse eixo.</p>
                <p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( get_the_permalink() ) ) ) . '</p>',
                'comment_notes_before' => '<p class="red">A sua participação pode ser através desse campo de comentários para opinar sobre os aspectos do Anteprojeto dentro desse eixo.</p>
                                            <p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'. ( isset($req) ? $required_text : '' ) . '</p>',
                'title_reply'          => 'Escreva sua opinião',
            ));
        endwhile;
        ?>
    </div>
<?php
get_footer();
