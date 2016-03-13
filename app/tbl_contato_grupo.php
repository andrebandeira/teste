<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class tbl_contato_grupo extends Model {

    protected $fillable = array('contato_grupo');
    
    /**
    * primaryKey
    *
    * @var int
    * @access protected
    */
    protected $primaryKey = 'contato_grupo';

    public $timestamps = false;
    
    /**
     * Retorna os grupos cadastrados
     *
     * @return Select
     */       
    public static function getGrupos(){
        $qry = "SELECT  descricao contato_grupo,
                        CONCAT( usuario,'_',empresa_sistema,'_',contato_grupo) idgrupo
                FROM    tbl_contato_grupo
                where   usuario is not null and 
                        empresa_sistema is not null and
                        contato_grupo is not null";

        return DB::select( DB::raw($qry) );
    }

}
