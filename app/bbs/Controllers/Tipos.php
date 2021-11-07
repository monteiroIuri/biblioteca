<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * CONTROLLER da página de Tipos
 *
 * @author Iuri Monteiro
 */
class Tipos 
{
    /** @var array $dados Recebe os dados que devem ser enviados para a VIEW */
    private $dados;
    
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
    
    public function index() {
        $this->cadTipo();
        
        $home = new \App\bbs\Models\BbsListagemCrud();
        $this->dados['crud'] = $home->index();
        $carregarView = new \Core\ConfigView("bbs/Views/crud/tipos", $this->dados);
        $carregarView->renderizar();
    }
}