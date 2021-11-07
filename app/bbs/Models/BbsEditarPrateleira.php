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
    
    /** @var $resultadoBd Recebe o resultado das informações que vieram do banco de dados */
    private $resultadoBd;
    
    /** @var bool $resultado Recebe o resultado das informações que estão sendo manipuladas */
    private $resultado;
    
    /** @var int $id Recebe o ID do usuário que será editado */
    private $id;
    
    /** @var array $dados Recebe os dados serão enviados para a View */
    private $dados;
    
    /** @var $listRegistryEdit Recebe os dados que serão usados no dropdown do formulário */
    private $listRegistryEdit;

    /** @return Retorna o resultado verdadeiro ou falso */
    function getResultado() {
        return $this->resultado;
    }
    
    /** @return Retorna o resultado do banco de dados*/
    function getResultadoBd() {
        return $this->resultadoBd;
    }

    /**
     * Método para fazer busca na tabela adms_users e validar as informações sobre o usuário antes de editar
     */
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

    /**
     * Método para validar os dados antes que a edição seja feita e retirar campos especificos da validação
     * @param array $dados Recebe a informação que será validada*/
    public function update(array $dados) {
        $this->dados = $dados;
        
        if (!empty($this->dados)) {
            $this->edit();
        } else {
            $this->resultado = false;
        }
    }

    /** Metodo privado, só pode ser chamado na classe
     * Metodo usado para salvar as informações editadas no banco de dados
     */
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

    /** Metodo usado para listar informações no dropdown do formulário*/
    public function listSelectSit() {
        $list = new \App\bbs\Models\helper\BbsRead();
        $list->fullRead("SELECT id, nome_situacao FROM bbs_sit_prateleiras ORDER BY id ASC");
        $registry['sit'] = $list->getResult();

        $this->listRegistryEdit = ['sit' => $registry['sit']];

        return $this->listRegistryEdit;
    }
}
