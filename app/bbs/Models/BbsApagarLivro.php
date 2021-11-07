<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * A classe BbsApagarLivro recebe a informação que será deletada do banco de dados
 *
 * @author Iuri Monteiro
 */
class BbsApagarLivro
{
 
    private $resultado;
    private $id;
    private $resultadoBd;
    
    function getResultado() {
        return $this->resultado;
    }
    
    public function deleteLivro($id) {
        $this->id = (int) $id;

        if ($this->viewLivro()) {
            $deleteLivro = new \App\bbs\Models\helper\BbsDelete();
            $deleteLivro->exeDelete("bbs_livros", "WHERE id =:id", "id={$this->id}");

            if ($deleteLivro->getResult()) {
                $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-success alert-dismissible fade show' role='alert'>
                                    Livro apagado com <strong>sucesso!</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                $this->resultado = true;
            } else {
                $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Livro não foi encontrado.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                $this->resultado = false;
            }
        } else {
            $this->resultado = false;
        }
    }
    
    private function viewLivro() {
        $viewLivro = new \App\bbs\Models\helper\BbsRead();
        $viewLivro->fullRead("SELECT id 
                            FROM bbs_livros
                            WHERE id=:id
                            LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultadoBd = $viewLivro->getResult();
        if ($this->resultadoBd) {
            return true;
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Livro não encontrado.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            return false;
        }
    }

}