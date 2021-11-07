<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of BbsEditarPrateleira
 *
 * @author Iuri Monteiro
 */
class BbsEditarPrateleira {

    private $resultado;
    private $dados;
    private $dadosId;

    function getResultado() {
        return $this->resultado;
    }
    
    public function altPrateleira($dadosId = null)
    {
        $this->dadosId = (int) $dadosId;
        $this->verPrateleira();
        if ($this->resultado) {
            $this->updatePrateleira();
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Não foi alterado a situação do livro!</div>";
            $this->resultado = false;
        }
    }

    public function verPrateleira($dadosId) {
        $this->dadosId = (int) $dadosId;
        $verPrateleira = new \App\bbs\Models\helper\BbsRead();
        $verPrateleira->fullRead("SELECT * FROM bbs_prateleiras
                WHERE id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");
        $this->resultado = $verPrateleira->getResult();
        return $this->resultado;
    }

    private function updatePrateleira() {
        $this->dados['modified'] = date("Y-m-d H:i:s");
        $upPrateleira = new \App\bbs\Models\helper\BbsUpdate();
        $upPrateleira->exeUpdate("bbs_prateleiras", $this->dados, "WHERE id =:id", "id=" . $this->dados['id']);
        if ($upPrateleira->getResult()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Usuário atualizado com sucesso!</div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O usuario não foi atualizado!</div>";
            $this->resultado = false;
        }
    }
    
}   