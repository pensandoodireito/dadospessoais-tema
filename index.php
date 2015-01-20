<?php get_header(); ?>
<div class="conteudo" id="protecao-dados">
    <!-- deixei para ver o breadcrmub!
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
                <p class="text-center fontsize-sm">Realização:</p>
                <div class="clearfix text-center fontsize-sm mt-md">
                    <div class="col-sm-4">
                        <p class="text-center">
                        Secretaria de
                        <br>
                        <strong>Assuntos Legislativos</strong>
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-center">
                        Secretaria
                        <br>
                        <strong>Nacional do Consumidor</strong>
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-center">
                        <strong>Participa.br</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="temas clearfix">
            <div class="col-sm-4">
                <h3 class="titulo font-amatic white">Temas</h3>
            </div>
            <div class="col-sm-6 col-sm-offset-1 white">
                <p class="mt-xl"><i class="fa fa-caret-right"></i><strong> <a href="#">O que são dados pessoais?</a></strong>
                </p>
                <p><i class="fa fa-caret-right"></i><strong> Por que é importante proteger os dados pessoais?</strong>
                </p>
                <p><i class="fa fa-caret-right"></i><strong> Quais são os direitos do cidadão?</strong>
                </p>
                <p><i class="fa fa-caret-right"></i><strong> É possível a venda, cruzamento ou compartilhamento dos dados?</strong>
                </p>
                <p><i class="fa fa-caret-right"></i><strong> Estes são apenas alguns temas levantados. <a href="#" class="yellow">Conheça todos</a></strong>
                </p>
            </div>
        </div>
        <div class="debates clearfix">
            <div class="col-md-6 col-md-offset-3">
                <div class="contexto">
                    <h3 class="font-amatic red h2">Debates</h3>
                    <p class="mt-md">O debate público, aberto pelo Ministério da Justiça, vai consultar a sociedade civil sobre os termos do anteprojeto de lei sobre o uso de dados pessoais do cidadão brasileiro.</p>
                    <p class="mt-md"><strong>O debate será feito por meio do site, que ficará disponível para receber contribuições da sociedade por 60 dias.</strong>
                    </p>
                    <p class="mt-md">
                    <button type="button" class="btn btn-danger btn-lg font-roboto">Participe do debate!</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php get_template_part('mini-tutorial'); ?>

<?php get_template_part('noticias'); ?>

<?php get_footer(); ?>