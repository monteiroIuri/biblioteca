<?php

namespace App\bbs\Models;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Model responsável em alterar a situação do livro para Indisponível na página home
 *
 * @author Iuri Monteiro
 */
class BbsAlugarLivro
{

    private $dadosId;
    private $resultado;
    private $dados;
    private $dadosLivro;

    function getResultado()
    {
        return $this->resultado;
    }

    public function altSitLivro($dadosId = null)
    {
        $this->dadosId = (int) $dadosId;
        $this->verLivro();
        if ($this->dadosLivro) {
            $this->altLivro();
        }else{
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Não foi possível alugar o livro.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = false;
        }
    }

    private function verLivro()
    {
        $verLivro = new \App\bbs\Models\helper\BbsRead();
        $verLivro->fullRead("SELECT id, id_sit_livro 
                FROM bbs_livros
                WHERE id =:id", "id={$this->dadosId}");        
        $this->dadosLivro = $verLivro->getResult();
    }

    private function altLivro()
    {
        if ($this->dadosLivro[0]['id_sit_livro'] == 1) {
            $this->dados['id_sit_livro'] = 2;
        } 
        /*else {
            $this->dados['id_sit_livro'] = 1;
        }*/
        $this->dados['modified'] = date("Y-m-d H:i:s");
        $upLivro = new \App\bbs\Models\helper\BbsUpdate();
        $upLivro->exeUpdate("bbs_livros", $this->dados, "WHERE id =:id", "id={$this->dadosId}");

        if ($upLivro->getResult()) {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-success alert-dismissible fade show' role='alert'>
                                    Livro alugado com <strong>sucesso!</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Não foi possível alugar o livro.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $this->resultado = false;
        }
    }

}
