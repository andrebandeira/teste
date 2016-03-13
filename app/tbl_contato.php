<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class tbl_contato extends Model {

    protected $fillable = array('contato', 'telefone', 'usuario', 'nome', 'email', 'contato_grupo');

    /**
     * primaryKey
     *
     * @var int
     * @access protected
     */
    protected $primaryKey = 'contato';
    public $timestamps = false;

    /**
     * Retorna os contatos de acordo com o filtro
     *
     * @return Select
     */    
    public static function getContatos($tipoFiltro, $descFiltro) {
        $qry = "SELECT  contato,
                        nome,
                        telefone,
                        email,
                        descricao contato_grupo,
                        CONCAT( tbl_contato.usuario,'_',tbl_contato.empresa_sistema,'_',tbl_contato.contato_grupo) idgrupo                                                              
                FROM    tbl_contato LEFT JOIN   tbl_contato_grupo ON tbl_contato.usuario = tbl_contato_grupo.usuario AND
						tbl_contato.contato_grupo                = tbl_contato_grupo.contato_grupo AND 
						tbl_contato.empresa_sistema              = tbl_contato_grupo.empresa_sistema
                :FILTRO";

        if ($tipoFiltro && $descFiltro) {
            switch ($tipoFiltro) {
                case 'filtroNome':
                    $qry = str_replace(':FILTRO', "WHERE nome LIKE '%$descFiltro%'", $qry);
                    break;
                case 'filtroTelefone':
                    $qry = str_replace(':FILTRO', "WHERE telefone LIKE '%$descFiltro%'", $qry);
                    break;
                case 'filtroEmail':
                    $qry = str_replace(':FILTRO', "WHERE email LIKE '%$descFiltro%'", $qry);
                    break;
                case 'filtroGrupo':
                    $qry = str_replace(':FILTRO', "WHERE descricao LIKE '%$descFiltro%'", $qry);
                    break;
                default :
                    $qry = str_replace(':FILTRO', '', $qry);
            }
        } else {
            $qry = str_replace(':FILTRO', '', $qry);
        }

        return DB::select(DB::raw($qry));
    }

    /**
     * Retorna os contatos de acordo com o id
     *
     * @return Select
     */       
    public static function getContato($idContato) {
        $qry = "SELECT  contato,
                        nome,
                        telefone,
                        email,
                        descricao contato_grupo,
                        CONCAT( tbl_contato.usuario,'_',tbl_contato.empresa_sistema,'_',tbl_contato.contato_grupo) idgrupo                                
                FROM    tbl_contato LEFT JOIN   tbl_contato_grupo ON tbl_contato.usuario = tbl_contato_grupo.usuario AND
						tbl_contato.contato_grupo                = tbl_contato_grupo.contato_grupo AND 
						tbl_contato.empresa_sistema              = tbl_contato_grupo.empresa_sistema
                WHERE   contato = :PAR_CONTATO";

        $qry = str_replace(':PAR_CONTATO', $idContato, $qry);

        return DB::select(DB::raw($qry));
    }

}
