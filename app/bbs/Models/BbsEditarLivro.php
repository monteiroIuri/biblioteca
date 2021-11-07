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

    /** Metodo usado para listar informações no dropdown do formulário*/
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
