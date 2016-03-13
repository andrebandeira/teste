<?php

namespace App\Http\Controllers;

use App\tbl_contato;
use App\tbl_contato_grupo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContatoRequest;

class Contatos extends Controller {

    /**
     * Retorna a view base
     *
     * @return view
     */
    public function index() {
        return view('contatos.index');
    }

    /**
     * Retorna a listagem dos contatos de acordo com os filtros
     *
     * @return view
     */    
    public function listar(Request $request) {
        return view('contatos.lista', ['contatos' => tbl_contato::getContatos($request->filtro,$request->descFiltro)]);
    }

    /**
     * Adiciona um contato
     *
     * @return Response
     */
    public function add(ContatoRequest $request) {
        try {
            $this->beginTransaction();

            $contato = new tbl_contato();

            $contato->telefone = $request->telefone;
            $contato->nome = $request->nome;
            $contato->email = $request->email;

            $grupo = explode('_', $request->grupo);
            $contato->usuario = $grupo[0];
            $contato->empresa_sistema = $grupo[1];
            $contato->contato_grupo = $grupo[2];

            $contato->save();

            $this->commit();
        } catch (\Exception $e) {
            $this->rollback();
            return $e->getMessage();
        }

        return 'Contato Criado com Sucesso' . $contato->id;
    }

    /**
     * Busca os dados de um contato
     *
     * @return view
     */
    
    public function buscar($id) {
        $dados = Array();
        $dados['contato'] = tbl_contato::getContato($id)[0];
        $dados['grupos'] = tbl_contato_grupo::getGrupos();
        return view('contatos.editar', $dados);
    }

    /**
     * Retorna a view para o cadastro da novo contato
     *
     * @return view
     */
    public function novo() {
        return view('contatos.novo', ['grupos' => tbl_contato_grupo::getGrupos()]);
    }

    /**
     * Edita um contato
     *
     * @return Response
     */    
    public function editar(ContatoRequest $request, int $id) {
        $contato = tbl_contato::find($id);

        $contato->telefone = $request->telefone;
        $contato->nome = $request->nome;
        $contato->email = $request->email;

        $grupo = explode('_', $request->grupo);
        $contato->usuario = $grupo[0];
        $contato->empresa_sistema = $grupo[1];
        $contato->contato_grupo = $grupo[2];

        $contato->save();

        return "Contato atualizado com sucesso. #" . $contato->id;
    }

    /**
     * Exclui um contato
     *
     * @return Response
     */    
    public function excluir(int $id) {
        $contato = tbl_contato::find($id);

        $contato->delete();

        return "Contato excluido com sucesso. #" . $id;
    }

}
