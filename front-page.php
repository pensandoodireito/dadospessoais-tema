<?php get_header(); ?>

<div class="conteudo" id="protecao-dados">
  <!-- inserir o breadcrmub!
    <div class="container mt-sm">
        <div class="row">
            <div class="col-md-6">
                <div class="bread-crumb">
                    <p><a href="">Página Inicial</a> / <a href="">Debates</a> /</p>
                </div>
                <h2 class="font-roboto red">Proteção de Dados Pessoais</h2>
            </div>
            <div class="col-md-6 text-right">
                <p class="mt-sm">
                <button type="button" class="btn btn-danger">Participe!</button>
                <strong class="mt-xs ml-md"><a href="#">Cadastre-se</a> | <a href="#">Já é cadastrado?</a></strong>
                </p>
            </div>
        </div>
    </div> -->
  <div class="container">
    <div class="apresenta-protecao">
      <div class="row">
        <div class="col-md-4 text-center">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo/protecao-w.png" class="img-adptive" alt="Proteção de Dados Pessoais">
        </div>
        <div class="col-md-8 white">
          <h2 class="font-amatic">o que é?</h2>
          <p>Toda pessoa tem direito à proteção de seus dados pessoais.</p>
          <p>Esta lei tem por objetivo garantir e proteger, no âmbito do tratamento de dados pessoais, a dignidade e os direitos fundamentais da pessoa, particularmente em relação à sua liberdade, igualdade e privacidade pessoal e familiar, nos termos do art. 5º, incisos X e XII da Constituição Federal</p>
        </div>
      </div>
      <div class="assinatura white">
        <p class="col-sm-6 col-sm-offset-6 fontsize-sm text-center">Realização:</p>
        <div class="clearfix text-center fontsize-sm mt-md">
          <div class="col-sm-3 col-sm-offset-6">
            <p class="text-center"> Secretaria de <br>
              <strong>Assuntos Legislativos</strong>
            </p>
          </div>
          <div class="col-sm-3">
            <p class="text-center"> Secretaria <br>
              <strong>Nacional do Consumidor</strong>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="debates clearfix">
      <div class="col-md-6 col-md-offset-3">
        <div class="contexto">
          <?php

                    $page_participe = pensando_get_participe_page();

                    if ($page_participe) {

                        ?>
          <h3 class="font-amatic red h2"><?php echo $page_participe->post_title; ?></h3>
          <p class="mt-md"><?php echo $page_participe->post_excerpt; ?></p>
          <p class="mt-md">
            <a href="<?php echo get_permalink($page_participe->ID); ?>" class="btn btn-danger btn-lg font-roboto">Participe do debate!</a>
          </p>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="temas clearfix">
      <div class="titulobox">
        <h3 class="titulo font-amatic white">Eixos</h3>
      </div>
      <div class="col-sm-6 col-sm-offset-4 white">
        <p class="mt-xl"></p>
        <?php
                // Gera os modais de eixos
                $query_eixos = new WP_Query("post_type=eixo-de-debate");

                if ($query_eixos->have_posts()) {
                    while ($query_eixos->have_posts()) {
                        $query_eixos->the_post();
                        ?>
        <p><i class="fa fa-caret-right"></i><strong>
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
          </strong>
        </p>
        <?php
                    }
                }

                wp_reset_query();
                ?>
      </div>
    </div>
  </div>
</div>
<?php get_template_part('mini-tutorial'); ?>
<?php get_template_part('noticias'); ?>
<?php get_footer(); ?>
