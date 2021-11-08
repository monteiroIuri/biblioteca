<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * CONTROLLER da página Home
 *
 * @author Iuri Monteiro
 */
class Home 
{

    private $dados;
    
    public function index() {
         
        $home = new \App\bbs\Models\BbsHome();
        $this->dados['bbs_livros'] = $home->index();
        
        $carregarView = new \Core\ConfigView("bbs/Views/home/home", $this->dados);
        $carregarView->renderizar();
    }
}
