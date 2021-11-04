<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of BbsCadastrarTipo
 *
 * @author Iuri Monteiro
 */
class BbsCadastrarTipo
{

    private $resultado;
    private $dados;
    
    public function getResultado()
    {
        return $this->resultado;
    }

    public function cadTipo(array $dados)
    {
        $this->dados = $dados;
        if(!empty($this->dados['nome_tipo']) AND !empty($this->dados['id_prateleira']) AND !empty($this->dados['id_sit_tipo'])){
            $this->inserirTipo();
            $this->resultado = true;
        }else {
            $this->resultado = false;
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Não foi possível cadastrar Novo Tipo. Preencha todos os campos.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
        }
    }

    private function inserirTipo()
    {
     
        $this->dados['created'] = date("Y-m-d H:i:s");

        $cadUsuario = new \App\bbs\Models\helper\BbsCreate;
        $cadUsuario->exeCreate("bbs_tipos", $this->dados);
        if($cadUsuario->getResult()){
           $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-success alert-dismissible fade show' role='alert'>
                                    Novo Tipo cadastrado com <strong>sucesso!</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
           $this->resultado = true;
        }else{
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Não foi possível cadastrar Novo Tipo. Tente novamente.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = false;
        }
        
    }

}