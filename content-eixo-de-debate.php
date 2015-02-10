<div class="container content-noticia">
    <div class="row">
        <h4 class="red"><strong><?php the_title(); ?></strong></h4>
        <div class="col-xs-8">
            <?php the_content(); ?>
        </div>
        <div class="col-xs-4">
            <div class="menu-submenu">
                <div class="panel panel-submenu">
                    <div class="panel-heading clearfix"><h6 class="panel-title pull-left">Veja também</h6> </div>
                    <div class="panel-body vertical">
                        <div class="menu">
                            <?php
                            $page_apl = dadospessoais_get_by_slug('anteprojeto-de-lei-para-a-protecao-de-dados-pessoais', OBJECT, 'texto-em-debate');
                            ?>
                            <a href="<?php echo get_permalink($page_apl->ID); ?>">
                                <strong class="fontsize-md"><i class="fa fa-chevron-right"></i> Confira este eixo no texto de lei</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>