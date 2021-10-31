<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * CONTROLLER da página de CRUD
 *
 * @author Iuri Monteiro
 */
class Crud 
{
    /** @var array $dados Recebe os dados que devem ser enviados para a VIEW */
    private $dados;

    /**
     * Instanciar a classe responsável em carregar a VIEW
     * 
     * @return void
     */
    public function index() {
        /* 
        $home = new \App\sts\Models\StsHome();
        $this->dados[''] = $home->index();
        
        */
        $this->dados = [];
        $carregarView = new \Core\ConfigView("bbs/Views/crud/crud", $this->dados);
        $carregarView->renderizar();
    }
}