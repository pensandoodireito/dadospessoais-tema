<div class="mt-md row">
	<div class="col-md-3">
		<?php get_template_part( "menu", "eixos" ); ?>
		<div class="mt-md" id="fixa-menu-eixo">
			<?php get_template_part( "menu", "indice" ); ?>
		</div>
	</div>
	<div class="col-md-9">
		<h4><strong><?php the_title(); ?></strong></h4>

		<div class="commentable-container">
			<?php the_content(); ?>
		</div>
		<div>
			<h4 class="divider-top red font-roboto mt-lg pt-lg">Contribuições em PDF</h4>
			<!-- data-section-id iniciando em um valor alto para não conflitar com os comentários do texto -->
			<?php
			$pdf_contribution_list = get_post_meta( get_the_ID(), 'pdf_contribution_list', true );

			foreach ( $pdf_contribution_list as $pdf_contribution ) { ?>
				<p class="md-lg pt-lg">
					<img alt="pdf"
					     src="<?php echo get_stylesheet_directory_uri(); ?>/images/pdf-icon.png"/><strong><?php echo $pdf_contribution['author']; ?></strong><br/>
					<a href="<?php echo $pdf_contribution['pdf_url']; ?>">Clique para baixar a contribuição em PDF</a>
				</p>
			<?php } ?>
			<p class="md-lg pt-lg">
			</p>
		</div>
	</div>
</div>
<div class="back-to-top">
	<a href="#" class="white"><i class="fa fa-level-up"></i> Voltar para o topo</a>
</div>
<?php
// Gera os modais de eixos
$query_eixos = new WP_Query( "post_type=eixo-de-debate&&posts_per_page=-1" );
if ( $query_eixos->have_posts() ) {
	while ( $query_eixos->have_posts() ) {
		$query_eixos->the_post();
		get_template_part( 'modal', 'eixo' );
	}
}
wp_reset_query();
