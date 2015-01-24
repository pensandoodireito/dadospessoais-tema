<div class="menu-submenu" id="menueixos-sticker">
    <div class="panel panel-submenu">
        <div class="panel-heading"><h6 class="panel-title">Eixos em debate</h6></div>
        <div class="panel-body vertical">
            <div class="menu">
                <ul>
                    <?php
                    // Gera os modais de eixos
                    $query_eixos = new WP_Query("post_type=eixo-de-debate");

                    if ($query_eixos->have_posts()) {
                        while ($query_eixos->have_posts()) {
                            $query_eixos->the_post();
                            ?>
                            <li class="page_item"><a href="javascript:void(0)" data-toggle="modal"
                                                     data-target="#modal-<?php the_ID(); ?>"
                                                     style="color: <?php echo get_post_meta(get_the_ID(), '_cor_eixo', true); ?>"><?php the_title(); ?></a>
                            </li>
                            <?php
                        }
                    }

                    wp_reset_query();
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
