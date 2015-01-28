<div class="mt-md row">
	<div class="col-md-3">
		<?php get_template_part("menu", "indice"); ?>
		<div class="mt-md" id="fixa-menu-eixo">
			<?php get_template_part("menu", "eixos"); ?>
		</div>
	</div>
	<div class="col-md-9">
		<h4><strong><?php the_title(); ?></strong></h4>
		<div class="commentable-container">
			<?php the_content(); ?>
		</div>
	</div>
</div>
<div class="back-to-top">
	<a href="#" class="white"><i class="fa fa-level-up"></i> Voltar para o topo</a>
</div>
<?php
// Gera os modais de eixos
$query_eixos = new WP_Query("post_type=eixo-de-debate&&posts_per_page=-1");
if ( $query_eixos->have_posts() ) {
	while ( $query_eixos->have_posts() ) {
		$query_eixos->the_post();
		get_template_part('modal', 'eixo');
	}
}
wp_reset_query();