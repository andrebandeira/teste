function excluir(id) {
    var dadosFormulario = $("#contatos").serialize();
    $.ajax({
        type: "POST",
        url: "contatos/excluir/" + id,
        dataType: "text",
        data: dadosFormulario,
        cache: false,
        success: function (response) {
            listar();
        },
        error: function (response) {
            alert('Erro: ' + response.responseText);
        }
    });
}

function buscar(id) {
    var dadosFormulario = $("#contatos").serialize();
    $.ajax({
        type: "POST",
        url: "contatos/buscar/" + id,
        dataType: "text",
        data: dadosFormulario,
        success: function (response) {
            $('#modalContainer').html(response);
            $('#myModal').modal('show');
        },
        error: function (response) {
            alert('Erro: ' + response.responseText);
        }
    });
}

function editar(id) {
    if (validaFormulario()) {
        var dadosFormulario = $("#editarContato").serialize();
        $.ajax({
            type: "POST",
            url: "contatos/editar/" + id,
            dataType: "text",
            data: dadosFormulario,
            success: function (response) {
                $('#myModal').modal('hide');
                $('#myModal').remove();
                $('.modal-backdrop').remove();
                listar();
            },
            error: function (response) {
                alert('Erro: ' + response.responseText);
            }
        });
    }
}

function novoContato() {
    $.ajax({
        type: "POST",
        url: "contatos/novoContato",
        dataType: "text",
        success: function (response) {
            $('#modalContainer').html(response);
            $('#myModal').modal('show');
        },
        error: function (response) {
            alert('Erro: ' + response.responseText);
        }
    });
}

function add() {
    if (validaFormulario()) {
        var dadosFormulario = $("#adicionarContato").serialize();
        $.ajax({
            type: "POST",
            url: "contatos/add",
            dataType: "text",
            data: dadosFormulario,
            success: function (response) {
                $('#myModal').modal('hide');
                $('#myModal').remove();
                $('.modal-backdrop').remove();
                listar();
            },
            error: function (response) {
                alert('Erro: ' + response.responseText);
            }
        });
    }
}

function listar() {
    var dadosFormulario = $("#contatos").serialize();
    $.ajax({
        type: "POST",
        url: "contatos/listar",
        dataType: "text",
        data: dadosFormulario,
        success: function (response) {
            $('#mainContainer').html(response);
        },
        error: function (response) {
            alert('Erro: ' + response.responseText);
        }
    });
}

function validaFormulario() {
    var nome = $("#nome").val();
    if (nome) {
        if (nome.length > 45) {
            alert('Atenção. Tamanho do campo nome inválido. Verifique!!!');
            return false;
        }
    }

    var email = $("#email").val();
    if (email) {
        if (email.length > 100) {
            alert('Atenção. Tamanho do campo email inválido. Verifique!!!');
            return false;
        }
	var er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/; 
	if( !er.exec(email) )
	{
            alert('Atenção. Email Inválido. Verifique!!!');
            return false;
	}
    }


    var grupo = $("#grupo").val();

    if (!grupo) {
        alert('Atenção. A seleção do grupo é obrigatória. Verifique!!!');
        return false;
    }
    
    return true;

}