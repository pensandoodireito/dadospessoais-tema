<div class="modal fade" id="modal-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title red font-roboto" id="myModalLabel"><strong><?php the_title(); ?></strong></h5>
      </div>
      <div class="modal-body">
        <?php the_content(); ?>
      </div>
      <div class="modal-footer">
        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Debata esse assunto dentro do eixo</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>