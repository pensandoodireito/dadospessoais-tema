<div class="menu-submenu eixo">
	<div class="panel panel-submenu">
		<div class="panel-heading clearfix"><h6 class="panel-title pull-left">Eixos em debate</h6>
			<button type="button" class="btn btn-default btn-xs fecha-menu-eixo pull-right" title="Econder este menu"><i
					class="fa fa-angle-up"></i></button>
		</div>
		<div class="panel-body vertical">
			<div class="menu" style="display:none;">
				<ul>
					<?php
					// Gera os modais de eixos
					$query_eixos = new WP_Query( "post_type=eixo-de-debate&orderby=menu_order&order=asc&posts_per_page=-1" );

					if ( $query_eixos->have_posts() ) {
						while ( $query_eixos->have_posts() ) {
							$query_eixos->the_post();
							?>
							<li class="page_item"><a href="javascript:void(0)" data-toggle="modal"
							                         data-target="#modal-<?php the_ID(); ?>"
							                         style="color: <?php echo get_post_meta( get_the_ID(), '_cor_eixo', true ); ?>"><?php the_title(); ?></a>
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
