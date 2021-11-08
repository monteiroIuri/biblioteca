<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of BbsEditarLivro
 *
 * @author Iuri Monteiro
 */
class BbsEditarLivro 
{
    
    private $resultadoBd;
    private $resultado;
    private $id;
    private $dados;
    private $listRegistryEdit;
    
    function getResultado() {
        return $this->resultado;
    }
    
    function getResultadoBd() {
        return $this->resultadoBd;
    }

    public function viewLivro($id) {
        $this->id = (int) $id;
        $viewLivro = new \App\bbs\Models\helper\BbsRead();
        $viewLivro->fullRead("SELECT id, nome_livro, autor, descricao, id_tipo, id_sit_livro
                FROM bbs_livros 
                WHERE id=:id
                LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultadoBd = $viewLivro->getResult();
        if ($this->resultadoBd) {
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Livro não encontrado.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = false;
        }
    }

    public function update(array $dados) {
        $this->dados = $dados;
        
        if (!empty($this->dados)) {
            $this->edit();
        } else {
            $this->resultado = false;
        }
    }

    private function edit() {
        $this->dados['modified'] = date("Y-m-d H:i:s");

        $upLivro = new \App\bbs\Models\helper\BbsUpdate();
        $upLivro->exeUpdate("bbs_livros", $this->dados, "WHERE id =:id", "id={$this->dados['id']}");

        if ($upLivro->getResult()) {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-success alert-dismissible fade show' role='alert'>
                                    Livro editado com <strong>sucesso!</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Livro não foi editado com sucesso.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = false;
        }
    }

    public function listSelect() {
        $list = new \App\bbs\Models\helper\BbsRead();
        $list->fullRead("SELECT id, nome_tipo FROM bbs_tipos ORDER BY id ASC");
        $registry['tipo'] = $list->getResult();
        
        $list->fullRead("SELECT id, nome_prateleira FROM bbs_prateleiras ORDER BY id ASC");
        $registry['prat'] = $list->getResult();
        
        $list->fullRead("SELECT id, nome_situacao FROM bbs_sit_livros ORDER BY id ASC");
        $registry['sit'] = $list->getResult();

        $this->listRegistryEdit = ['tipo' => $registry['tipo'], 'prat' => $registry['prat'], 'sit' => $registry['sit']];

        return $this->listRegistryEdit;
    }
}
