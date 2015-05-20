<?php get_header(); ?>
<div class="conteudo" id="protecao-dados">
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
      <div class="assinatura">
        <div class="row">
          <div class="col-sm-6">
            <div class="clearfix text-center fontsize-sm mt-md">
              <p class="fontsize-sm text-center clearfix">Realização:</p>
              <div class="col-sm-6">
                <p class="text-center"> Secretaria de <br>
                  <strong>Assuntos Legislativos</strong>
                </p>
              </div>
              <div class="col-sm-6">
                <p class="text-center"> Secretaria <br>
                  <strong>Nacional do Consumidor</strong>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <p class="text-center mt-lg fontsize-lg">
              <a href="<?php echo dadospessoais_get_english_information_link(); ?>" class="font-roboto"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/english.png" class="mr-xs"> English information</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="debates">
          <div class="col-md-6 participe">
            <div class="contexto white">
              <?php
              $page_participe = participacao_get_participe_page();
              if ($page_participe) {
              ?>
              <h3 class="font-amatic h2"><?php echo $page_participe->post_title; ?></h3>
              <p class="mt-md"><?php echo $page_participe->post_excerpt; ?></p>
              <p class="mt-md">
                <a href="<?php echo get_permalink($page_participe->ID); ?>" class="btn btn-danger btn-lg font-roboto">Participe do debate!</a>
              </p>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-6 sobretexto">
            <div class="contexto white">
              <h3 class="font-amatic h2">Sobre o texto </h3>
              <?php
              $page_anteprojeto = dadospessoais_get_anteprojeto_page();
              if ($page_anteprojeto) {
              ?>
              <p class="mt-md"><?php echo $page_anteprojeto->post_excerpt; ?></p>
              <p class="mt-md">
                <a href="<?php echo get_permalink($page_anteprojeto); ?>" class="btn btn-primary btn-lg font-roboto">Comente o texto do Anteprojeto</a>
              </p>
              <?php } ?>
            </div>
          </div>
      </div>
      <div class="temas">
        <div class="titulobox">
          <h3 class="titulo font-amatic white">Eixos</h3>
        </div>
        <div class="col-sm-6 col-sm-offset-4 white">
          <ul class="eixos-home">
            <?php
            // Gera os modais de eixos
            $query_eixos = new WP_Query("post_type=eixo-de-debate&orderby=menu_order&order=asc&posts_per_page=-1");
            if ($query_eixos->have_posts()) {
            while ($query_eixos->have_posts()) {
            $query_eixos->the_post();
            ?>
            <li>
              <strong>
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
              </strong>
            </li>
            <?php
            }
            }
            wp_reset_query(); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php get_template_part('mini-tutorial'); ?>
  <?php get_template_part('front','noticias'); ?>
  <?php get_footer(); ?>