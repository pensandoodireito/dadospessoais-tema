<div class="container content-noticia">
	<div class="row">
    <h4 class="red"><strong><?php the_title(); ?></strong></h4>
        <div class="col-xs-10">
            <?php the_content(); ?>
        </div>
        <div class="col-xs-2">
            <?php
            $page_apl = dadospessoais_get_by_slug('anteprojeto-de-lei-para-a-protecao-de-dados-pessoais', OBJECT, 'texto-em-debate');
            ?>
            <a href="<?php echo get_permalink($page_apl->ID); ?>">
                Visualizar este eixo no texto de lei
            </a>
        </div>
    </div>
</div>