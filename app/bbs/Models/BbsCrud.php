<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Model responsável em buscar os dados da página Crud
 *
 * @author Iuri Monteiro
 */
class BbsCrud 
{
    private $dados;
    
    public function index() {
        $this->getPrateleiras();
        $this->getQntPrateleiras();
        $this->getTipos();
        $this->getQntTipos();
        $this->getLivros();
        $this->getQntLivros();
        return $this->dados;
    }
    
    public function getPrateleiras() {
        $listar = new \App\bbs\Models\helper\BbsRead();
        $listar->fullRead('
                SELECT
                bp.id
                ,bp.nome_prateleira
                ,bsp.nome_situacao
                FROM bbs_prateleiras AS bp
                INNER JOIN bbs_sit_prateleiras as bsp
                ON bsp.id = bp.id_sit_prateleira 
                ');
        $this->dados['prateleiras'] = $listar->getResult();
        return $this->dados;
    }
    
    public function getQntPrateleiras() {
        $qntPrateleiras = new \App\bbs\Models\helper\BbsRead();
        $qntPrateleiras->fullRead('SELECT COUNT(id) as qnt_prateleiras FROM bbs_prateleiras');
        $this->dados['qnt_prateleiras'] = $qntPrateleiras->getResult();
        return $this->dados;
    }

    public function getTipos() {
        $listar = new \App\bbs\Models\helper\BbsRead();
        $listar->fullRead('
                SELECT
                bt.id
                ,bt.nome_tipo
                ,bp.nome_prateleira
                ,bst.nome_situacao
                FROM bbs_tipos bt
                INNER JOIN bbs_prateleiras AS bp 
                ON bp.id = bt.id_prateleira
                INNER JOIN bbs_sit_tipos AS bst
                ON bst.id = bt.id_sit_tipo
                ');
        $this->dados['tipos'] = $listar->getResult();
        return $this->dados;
    }
    
    public function getQntTipos() {
        $qntTipos = new \App\bbs\Models\helper\BbsRead();
        $qntTipos->fullRead('SELECT COUNT(id) as qnt_tipos FROM bbs_tipos');
        $this->dados['qnt_tipos'] = $qntTipos->getResult();
        return $this->dados;
    }

    public function getLivros() {
        $listar = new \App\bbs\Models\helper\BbsRead();
        $listar->fullRead('
                SELECT 
                bl.id
                ,bl.nome_livro
                ,bl.autor
                ,bt.nome_tipo
                ,bp.nome_prateleira
                ,bsl.nome_situacao
                FROM bbs_livros AS bl
                INNER JOIN bbs_tipos AS bt ON bt.id = bl.id_tipo
                INNER JOIN bbs_prateleiras AS bp ON bp.id = bl.id_prateleira
                INNER JOIN bbs_sit_livros AS bsl ON bsl.id = bl.id_sit_livro
                ');
        $this->dados['livros'] = $listar->getResult();
        return $this->dados;
    }
    
    public function getQntLivros() {
        $qntLivros = new \App\bbs\Models\helper\BbsRead();
        $qntLivros->fullRead('SELECT COUNT(id) as qnt_livros FROM bbs_livros');
        $this->dados['qnt_livros'] = $qntLivros->getResult();
        return $this->dados;
    }
    
}