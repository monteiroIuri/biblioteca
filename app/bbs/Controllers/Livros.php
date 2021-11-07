<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * CONTROLLER da página de Livros
 *
 * @author Iuri Monteiro
 */
class Livros 
{
    /** @var array $dados Recebe os dados que devem ser enviados para a VIEW */
    private $dados;
    
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
        $this->cadLivro();
        
        $home = new \App\bbs\Models\BbsListagemCrud();
        $this->dados['crud'] = $home->index();
        $carregarView = new \Core\ConfigView("bbs/Views/crud/livros", $this->dados);
        $carregarView->renderizar();
    }
}