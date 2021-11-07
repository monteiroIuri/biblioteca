<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of BbsCadastrarLivro
 *
 * @author Iuri Monteiro
 */
class BbsCadastrarLivro
{

    private $resultado;
    private $dados;
    
    public function getResultado()
    {
        return $this->resultado;
    }

    public function cadLivro(array $dados)
    {
        $this->dados = $dados;
        if(!empty($this->dados['nome_livro']) AND !empty($this->dados['autor']) AND 
                !empty($this->dados['descricao']) AND !empty($this->dados['id_tipo']) AND 
                !empty($this->dados['id_sit_livro'])){
            $this->inserirLivro();
            $this->resultado = true;
        }else {
            $this->resultado = false;
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Não foi possível cadastrar Novo Livro. Preencha todos os campos.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
        }
    }

    private function inserirLivro()
    {
     
        $this->dados['created'] = date("Y-m-d H:i:s");

        $cadLivro = new \App\bbs\Models\helper\BbsCreate;
        $cadLivro->exeCreate("bbs_livros", $this->dados);
        if($cadLivro->getResult()){
           $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-success alert-dismissible fade show' role='alert'>
                                    Novo Livro cadastrado com <strong>sucesso!</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
           $this->resultado = true;
        }else{
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Não foi possível cadastrar Novo Livro. Tente novamente.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = false;
        }
        
    }

}