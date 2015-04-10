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
                
                <h4>Contribuições em texto</h4>
                <!-- data-section-id iniciando em um valor alto para não conflitar com os comentários do texto -->
                <p class="commentable-section" data-section-id="9999">
                    <img alt="pdf" src="<?php echo get_stylesheet_directory_uri();?>/images/pdf-icon.png"/><strong>Facebook Brasil</strong>
                    <iframe id="pauta-pdf-content" style="width: 100%; min-height: 250px; max-height: 800px; height: 300px;" src="https://docs.google.com/viewer?url=http%3A%2F%2Fparticipacao.mj.gov.br%2Fmarcocivil%2Fwp-content%2Fuploads%2Fsites%2F2%2F2015%2F03%2FCONSULTA-PUBLICA-MJ-Contribui%C3%A7%C3%A3o-MPAAL-NEUTRALIDADE-DA-REDE1.pdf&embedded=true">
                    </iframe>
                </p>
            </div>
            <hr/>
            <div>
                <h4>Remeter contribuição em PDF</h4>
                <form enctype="multipart/form-data">
                    <div class="mt-md">
                        <input class="btn btn-info" type="file" data-filename-placement="inside" name="pauta_pdf_contribution" title="Selecione o arquivo PDF que você deseja enviar.">
                    </div>
                    <div class="mt-md">
                        <button type="submit" class="btn btn-primary">Enviar arquivo</button>
                    </div>
                </form>
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