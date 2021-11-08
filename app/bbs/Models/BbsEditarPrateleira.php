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
class BbsEditarPrateleira 
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

    public function viewPrateleira($id) {
        $this->id = (int) $id;
        $viewPrat = new \App\bbs\Models\helper\BbsRead();
        $viewPrat->fullRead("SELECT id, nome_prateleira, id_sit_prateleira
                FROM bbs_prateleiras 
                WHERE id=:id
                LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultadoBd = $viewPrat->getResult();
        if ($this->resultadoBd) {
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Prateleira não encontrada.
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

        $upPrat = new \App\bbs\Models\helper\BbsUpdate();
        $upPrat->exeUpdate("bbs_prateleiras", $this->dados, "WHERE id =:id", "id={$this->dados['id']}");

        if ($upPrat->getResult()) {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-success alert-dismissible fade show' role='alert'>
                                    Prateleira editada com <strong>sucesso!</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Prateleira não foi editada com sucesso.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = false;
        }
    }

    public function listSelectSit() {
        $list = new \App\bbs\Models\helper\BbsRead();
        $list->fullRead("SELECT id, nome_situacao FROM bbs_sit_prateleiras ORDER BY id ASC");
        $registry['sit'] = $list->getResult();

        $this->listRegistryEdit = ['sit' => $registry['sit']];

        return $this->listRegistryEdit;
    }
}
