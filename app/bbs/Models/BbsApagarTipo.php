<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * A classe BbsApagarTipo recebe a informação que será deletada do banco de dados
 *
 * @author Iuri Monteiro
 */
class BbsApagarTipo
{
    
    private $resultado;
    private $id;
    private $resultadoBd;
    
    function getResultado() {
        return $this->resultado;
    }
    
    public function deleteTipo($id) {
        $this->id = (int) $id;

        if ($this->viewTipo()) {
            $deleteTipo = new \App\bbs\Models\helper\BbsDelete();
            $deleteTipo->exeDelete("bbs_tipos", "WHERE id =:id", "id={$this->id}");

            if ($deleteTipo->getResult()) {
                $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-success alert-dismissible fade show' role='alert'>
                                    Tipo apagado com <strong>sucesso!</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                $this->resultado = true;
            } else {
                $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Tipo não pode ser apagado se exitirem Livros vinculados, ou não foi encontrado.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                $this->resultado = false;
            }
        } else {
            $this->resultado = false;
        }
    }
    
    private function viewTipo() {
        $viewTipo = new \App\bbs\Models\helper\BbsRead();
        $viewTipo->fullRead("SELECT id 
                            FROM bbs_tipos
                            WHERE id=:id
                            LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultadoBd = $viewTipo->getResult();
        if ($this->resultadoBd) {
            return true;
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Tipo não encontrado.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            return false;
        }
    }

}