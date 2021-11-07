<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of ApagarLivro
 *
 * @author Iuri Monteiro
 */
class ApagarLivro {

    /** @var $id Recebe o ID do usuário que será deletado do sistema*/
    private $id;
    
    /** Metodo para receber os dados da View e enviar para Models */
    public function index($id = null) {
        $this->id = (int) $id;
        echo $this->id;
        
        if(!empty($this->id)){
            $deleteLivro = new \App\bbs\Models\BbsApagarLivro();
            $deleteLivro->deleteLivro($this->id);
            echo "deu bom";
        }else{
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Necessário selecionar uma Prateleira.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
        }
        
        $urlDestino = URL . "livros/index";
        header("Location: $urlDestino");
    }

}
