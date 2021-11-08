<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of ApagarPrateleira
 *
 * @author Iuri Monteiro
 */
class ApagarPrateleira {

    private $id;
    
    public function index($id = null) {
        $this->id = (int) $id;
        echo $this->id;
        
        if(!empty($this->id)){
            $deletePrat = new \App\bbs\Models\BbsApagarPrateleira();
            $deletePrat->deletePrateleira($this->id);
        }else{
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Necessário selecionar uma Prateleira.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
        }
        
        $urlDestino = URL . "prateleiras/index";
        header("Location: $urlDestino");
    }

}
