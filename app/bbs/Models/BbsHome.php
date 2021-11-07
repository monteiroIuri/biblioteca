<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Model responsável em buscar os dados da página home
 *
 * @author Iuri Monteiro
 */
class BbsHome {

    private $dados;

    public function index() {
        $this->getPrateleiras();
        $this->getTipos();
        $this->getLivros();
        return $this->dados;
    }
    
    public function getPrateleiras() {
        $listar = new \App\bbs\Models\helper\BbsRead();
        $listar->fullRead('
                SELECT
                id
                ,nome_prateleira
                ,id_sit_prateleira
                FROM bbs_prateleiras
                ');
        $this->dados['prateleiras'] = $listar->getResult();
        return $this->dados;
    }

    public function getTipos() {
        $listar = new \App\bbs\Models\helper\BbsRead();
        $listar->fullRead('
                SELECT
                bt.id
                ,bt.id_prateleira
                ,bt.nome_tipo
                ,bt.id_sit_tipo
                FROM bbs_tipos bt
                INNER JOIN bbs_prateleiras AS bp ON bt.id_prateleira = bp.id
                ');
        $this->dados['tipos'] = $listar->getResult();
        return $this->dados;
    }

    public function getLivros() {
        $listar = new \App\bbs\Models\helper\BbsRead();
        $listar->fullRead('
                SELECT 
                bl.id
                ,bl.nome_livro
                ,bl.autor
                ,bl.descricao
                ,bl.id_tipo
                ,bt.nome_tipo
                ,bp.nome_prateleira
                ,bsl.nome_situacao
                ,bl.imagem_livro 
                FROM bbs_livros AS bl
                INNER JOIN bbs_tipos AS bt ON bt.id = bl.id_tipo
                INNER JOIN bbs_prateleiras AS bp ON bp.id = bl.id_prateleira
                INNER JOIN bbs_sit_livros AS bsl ON bsl.id = bl.id_sit_livro
                ORDER BY bl.id
                ');
        $this->dados['livros'] = $listar->getResult();
        return $this->dados;
    }

}