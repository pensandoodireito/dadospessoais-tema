<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php get_template_part("menu", "horizontal"); ?>
		</div>
	</div>
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
</div>
<?php get_template_part('modalteste'); ?>
