<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of AlugarLivro
 *
 * @author Iuri Monteiro
 */
class DevolverLivro {

    private $dadosId;
    private $situacao;
    
    public function index() {
        $this->situacao = filter_input(INPUT_GET, 'situacao', FILTER_SANITIZE_NUMBER_INT);
        $this->dadosId = $this->situacao;
        if (!empty($this->dadosId)) {
            $altSitLivro = new \App\bbs\Models\BbsDevolverLivro();
            $altSitLivro->altSitLivro($this->dadosId);
        }
        
        $UrlDestino = URL . "#prateleira1";
        header("Location: $UrlDestino");
    }

}
