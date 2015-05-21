<div class="mt-md row">
	<div class="col-md-3">
		<?php get_template_part("menu", "eixos"); ?>
		<div class="mt-md" id="fixa-menu-eixo">
			<?php get_template_part("menu", "indice"); ?>
		</div>
	</div>
	<div class="col-md-9">
		<h4><strong><?php the_title(); ?></strong></h4>
		<div class="commentable-container">
			<?php the_content(); ?>

			<h4 class="divider-top red font-roboto mt-lg pt-lg">Contribuições em PDF</h4>
			<!-- data-section-id iniciando em um valor alto para não conflitar com os comentários do texto -->
			<?php
			$pdf_contribution_list = get_post_meta(get_the_ID(), 'pdf_contribution_list', true);

			$data_section = 10000;

			foreach ($pdf_contribution_list as $pdf_contribution) {

			?>
			<p class="commentable-section" data-section-id="<?php echo $data_section; ?>">
				<img alt="pdf" src="<?php echo get_stylesheet_directory_uri();?>/images/pdf-icon.png"/><strong><?php echo $pdf_contribution['author']; ?></strong><br/>
				<a href="<?php echo $pdf_contribution['pdf_url']; ?>">Clique para baixar a contribuição em PDF</a>
        <br/>
			</p>
			<?php
			$data_section++;

			} ?>
		</div>
		<div class="well">
			<h5><strong>Envie sua contribuição em PDF</strong></h5>

			<?php if (is_user_logged_in()) { ?>
      <form method="POST" id="form-contribuicao-pdf" action="<?php echo $_SERVER['PHP_SELF'] ?>#form-contribuicao-pdf" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-8 mt-sm">
            <input type="hidden" name="file_nonce" value="<?php echo wp_create_nonce('pdf-upload'); ?>" />
						<input type="file" class="filestyle" data-buttonBefore="true" name="pdf_contribution" data-buttonText="Procurar arquivo..." value="">
					</div>
					<div class="col-sm-4 mt-sm">
						<button type="submit"  class="btn btn-default">Enviar arquivo selecionado</button>
					</div>
				</div>
			</form>
			<?php } else { ?>
			<strong>Você precisa estar logado no sistema para enviar uma contribuição. </strong>
			<a href="<?php echo wp_login_url($_SERVER['REQUEST_URI']); ?>">Faça seu login</a> ou <a href="<?php echo wp_registration_url(); ?>">Cadastre-se</a>
			<?php } ?>
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
