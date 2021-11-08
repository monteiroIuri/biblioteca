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
    
    public function cadTipo()
    {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->dados['CadTipo'])) {
            unset($this->dados['CadTipo']);
            $cadTipo = new \App\bbs\Models\BbsCadastrarTipo();
            $cadTipo->cadTipo($this->dados);
            $cadTipo->getResultado();
        }
    }
    
    public function cadLivro()
    {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->dados['CadLivro'])) {
            unset($this->dados['CadLivro']);
            $cadTipo = new \App\bbs\Models\BbsCadastrarLivro();
            $cadTipo->cadLivro($this->dados);
            $cadTipo->getResultado();
        }
    }
    
    public function index() {
        $this->cadPrateleira();
        $this->cadTipo();
        $this->cadLivro();
        //$this->editPrateleira();
        
        $home = new \App\bbs\Models\BbsListagemCrud();
        $this->dados['crud'] = $home->index();
        $carregarView = new \Core\ConfigView("bbs/Views/crud/crud", $this->dados);
        $carregarView->renderizar();
    }
}