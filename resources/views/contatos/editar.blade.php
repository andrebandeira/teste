<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Contato</h4>
            </div>
            <div class="modal-body">
                <form name="editarContato" id="editarContato" class="form-horizontal">

                    <div class="form-group error">
                        <label for="nome" class="col-sm-3 control-label">Nome</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="nome" name="nome" placeholder="Nome Completo" maxlength="45" value="{{ $contato->nome}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefone" class="col-sm-3 control-label">Telefone</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" maxlength="15" value="{{ $contato->telefone}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="100" value="{{ $contato->email}}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="grupo" class="col-sm-3 control-label">Grupo</label>
                        <div class="col-sm-9">
                            <select id="grupo" name="grupo" class="form-control" place>
                                <option value="" disabled>Selecione o Grupo</option>
                                @foreach ($grupos as $grupo)
                                <option id="{{ $grupo->idgrupo}}" value="{{ $grupo->idgrupo}}" name="{{ $grupo->idgrupo}}" <?php
                                if ($grupo->idgrupo == $contato->idgrupo) {
                                    echo 'selected';
                                }
                                ?> name="{{ $grupo->idgrupo}}">{{ $grupo->contato_grupo}}</option>                                
                                @endforeach
                            </select>                            
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" onclick="editar({{ $contato->contato }})">Editar</button>
            </div>
        </div>
    </div>
</div> 
<script>
    $(document).ready(function() {    
        $("#telefone").mask("(99) 99999-9999");
    });
</script>