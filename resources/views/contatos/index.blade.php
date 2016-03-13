<!DOCTYPE html>
<html>
    <head>
        <title>CRUD Teste</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= asset('css/teste.css') ?>" rel="stylesheet">
    </head>
    <body>
        <form id="contatos">
            <fieldset>
                <legend>Filtros</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div class="radio-inline" >
                            <label>
                                <input type="radio" name="filtro" id="filtroNome" value="filtroNome" checked>
                                Nome
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="filtro" id="filtroTelefone" value="filtroTelefone">
                                Telefone
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="filtro" id="filtroEmail" value="filtroEmail">
                                Email
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="filtro" id="filtroGrupo" value="filtroGrupo">
                                Grupo
                            </label>
                        </div>   
                    </div>          
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="descFiltro" name="descFiltro" placeholder="Digite o Filtro Desejado">
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" id="btn-filter" onclick="listar()">Filtrar</button>
                    </div>
                </div>
            </fieldset>
            <div id="mainContainer" name="mainContainer"></div>
        </form>
        <div id="modalContainer" name="modalContainer"></div>

        <!-- Load Javascript Libraries (JQuery, Bootstrap) -->
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script> 
        <script src="<?= asset('js/teste.js') ?>"></script> 
        <script src="<?= asset('js/jquery.mask.js') ?>"></script> 
        <script>
            $(document).ready(function () {
                listar();
            });
        </script>
    </body>
</html>
