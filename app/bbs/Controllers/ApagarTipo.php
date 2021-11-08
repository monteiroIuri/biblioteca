<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of ApagarTipo
 *
 * @author Iuri Monteiro
 */
class ApagarTipo {

    private $id;
    
    public function index($id = null) {
        $this->id = (int) $id;
        echo $this->id;
        
        if(!empty($this->id)){
            $deleteTipo = new \App\bbs\Models\BbsApagarTipo();
            $deleteTipo->deleteTipo($this->id);
        }else{
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Necessário selecionar um Tipo.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
        }
        
        $urlDestino = URL . "tipos/index";
        header("Location: $urlDestino");
    }

}
