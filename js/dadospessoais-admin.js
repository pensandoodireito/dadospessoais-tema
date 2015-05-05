function deletar_pdf(key, post_ID) {

    if (!confirm("Deseja mesmo remover essa contribuição?")) {
        return false;
    }

    var loader = '<span id="loader-gif">Carregando mais notícias... <img src="' + dadosPessoais.ajaxgif + '"/></span>';
    jQuery("#delete_pdf_key_" + key).append(loader);

    var data = {
        'action': 'dadospessoais_remove_pdf',
        'chave': key,
        'post_ID': post_ID
    }

    jQuery.ajax({
        url: dadosPessoais.ajaxurl,
        method: 'POST',
        data: data,
        success: function (html) {
            jQuery('#loader-gif').remove();
            jQuery("#delete_pdf_key_" + key).remove();
        },
        error: function(){
            alert("Erro ao deletar arquivo");
        }
    });

    return false;
}

function altera_autor_pdf(key, post_ID, novo_autor) {
    var loader = '<span id="loader-gif">Carregando mais notícias... <img src="' + dadosPessoais.ajaxgif + '"/></span>';
    jQuery("#delete_pdf_key_" + key).append(loader);

    var data = {
        'action': 'dadospessoais_altera_autor_pdf',
        'chave': key,
        'post_ID': post_ID,
        'novo_autor': novo_autor
    }

    jQuery.ajax({
        url: dadosPessoais.ajaxurl,
        method: 'POST',
        data: data,
        success: function (html) {
            jQuery('#loader-gif').remove();
        },
        error: function(){
            alert("Erro ao modificar autor");
        }
    });
}
