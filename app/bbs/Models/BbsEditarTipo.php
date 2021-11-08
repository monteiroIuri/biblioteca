<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of BbsEditarTipo
 *
 * @author Iuri Monteiro
 */
class BbsEditarTipo 
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

    public function viewTipo($id) {
        $this->id = (int) $id;
        $viewTipo = new \App\bbs\Models\helper\BbsRead();
        $viewTipo->fullRead("SELECT id, nome_tipo,id_prateleira, id_sit_tipo
                FROM bbs_tipos 
                WHERE id=:id
                LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultadoBd = $viewTipo->getResult();
        if ($this->resultadoBd) {
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Tipo não encontrado.
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

        $upTipo = new \App\bbs\Models\helper\BbsUpdate();
        $upTipo->exeUpdate("bbs_tipos", $this->dados, "WHERE id =:id", "id={$this->dados['id']}");

        if ($upTipo->getResult()) {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-success alert-dismissible fade show' role='alert'>
                                    Tipo editado com <strong>sucesso!</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Tipo não foi editado com sucesso.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = false;
        }
    }

    public function listSelect() {
        $list = new \App\bbs\Models\helper\BbsRead();
        $list->fullRead("SELECT id, nome_prateleira FROM bbs_prateleiras ORDER BY id ASC");
        $registry['prat'] = $list->getResult();
        
        $list->fullRead("SELECT id, nome_situacao FROM bbs_sit_tipos ORDER BY id ASC");
        $registry['sit'] = $list->getResult();

        $this->listRegistryEdit = ['prat' => $registry['prat'], 'sit' => $registry['sit']];

        return $this->listRegistryEdit;
    }
}
