<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * A classe BbsApagarPrateleira recebe a informação que será deletada do banco de dados
 *
 * @author Iuri Monteiro
 */
class BbsApagarPrateleira
{
    /** @var bool $resultado Recebe o resultado das informações que estão sendo manipuladas */
    private $resultado;
    
    /** @var int $id Contem a Id da prateleira que será deletada do sistema */
    private $id;
    
    /** @var $resultadoBd Recebe o resultado das informações que vieram do banco de dados */
    private $resultadoBd;
    
    /** @return Retorna o resultado verdadeiro ou falso */
    function getResultado() {
        return $this->resultado;
    }
    
    /**
     * Método para fazer busca do Id na tabela bbs_prateleiras e validar o mesmo
     * @param array $id Recebe a informação que será validada e deletada do banco de dados */
    public function deletePrateleira($id) {
        $this->id = (int) $id;

        if ($this->viewPrateleira()) {
            $deletePrat = new \App\bbs\Models\helper\BbsDelete();
            $deletePrat->exeDelete("bbs_prateleiras", "WHERE id =:id", "id={$this->id}");

            if ($deletePrat->getResult()) {
                $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-success alert-dismissible fade show' role='alert'>
                                    Prateleira apagada com <strong>sucesso!</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                $this->resultado = true;
            } else {
                $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Prateleira não pode ser apagada se exitirem Tipos vinculados, ou não foi encontrada.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                $this->resultado = false;
            }
        } else {
            $this->resultado = false;
        }
    }
    
    /** Metodo privado, só pode ser chamado na classe
     * Metodo usado para verificar se a prateleira está cadastrada no sistema, caso esteja, o resultado é enviado para o metodo deletePrateleira
     */
    private function viewPrateleira() {
        $viewPrat = new \App\bbs\Models\helper\BbsRead();
        $viewPrat->fullRead("SELECT id 
                            FROM bbs_prateleiras
                            WHERE id=:id
                            LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultadoBd = $viewPrat->getResult();
        if ($this->resultadoBd) {
            return true;
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Prateleira não encontrada.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            return false;
        }
    }

}