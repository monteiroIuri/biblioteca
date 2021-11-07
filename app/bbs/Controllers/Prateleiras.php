<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * CONTROLLER da página de Prateleiras
 *
 * @author Iuri Monteiro
 */
class Prateleiras 
{
    /** @var array $dados Recebe os dados que devem ser enviados para a VIEW */
    private $dados;
    
    public function cadPrateleira()
    {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->dados['CadPrateleira'])) {
            unset($this->dados['CadPrateleira']);
            $cadPrateleira = new \App\bbs\Models\BbsCadastrarPrateleira();
            $cadPrateleira->cadPrateleira($this->dados);
            $cadPrateleira->getResultado();
        }
    }
    
    public function index() {
        $this->cadPrateleira();
        
        $home = new \App\bbs\Models\BbsListagemCrud();
        $this->dados['crud'] = $home->index();
        $carregarView = new \Core\ConfigView("bbs/Views/crud/prateleiras", $this->dados);
        $carregarView->renderizar();
    }
}