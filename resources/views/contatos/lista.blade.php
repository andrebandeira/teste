<fieldset>
    <legend>Lista de Contatos</legend>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Grupo</th>
                    <th>
                        <button type='button' id="btn-add" class="btn btn-primary btn-xs" onclick="novoContato()">Adicionar Contato</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contatos as $contato)
                <tr>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->telefone }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->contato_grupo }}</td>
                    <td>
                        <button type='button' class="btn btn-default btn-xs btn-detail" onclick="buscar({{ $contato->contato }})">Editar</button>
                        <button type='button' class="btn btn-danger btn-xs btn-delete" onclick="excluir({{ $contato->contato }})">Excluir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</fieldset>
