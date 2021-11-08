<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of EditarLivro
 *
 * @author Iuri Monteiro
 */
class EditarLivro 
{
    
    private $dados;
    private $dadosForm;
    private $id;
    public function index($id) {
        $this->id = (int) $id;

        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->id) AND (empty($this->dadosForm['EditLivro']))) {
            $viewLivro = new \App\bbs\Models\BbsEditarLivro();
            $viewLivro->viewLivro($this->id);
            if ($viewLivro->getResultado()) {
                $this->dados['form'] = $viewLivro->getResultadoBd();
                $this->viewEditLivro();
            } else {
                $urlDestino = URL . "livros/index";
                header("Location: $urlDestino");
            }
        } else {
            $this->editLivro();
        }
    }

    private function viewEditLivro() {

        $listSelect = new \App\bbs\Models\BbsEditarLivro();
        $this->dados['select'] = $listSelect->listSelect();

        $carregarView = new \Core\ConfigView("bbs/Views/crud/editarLivro", $this->dados);
        $carregarView->renderizar();
    }

    private function editLivro() {
        if (!empty($this->dadosForm['EditLivro'])) {
            unset($this->dadosForm['EditLivro']);
            $editLivro = new \App\bbs\Models\BbsEditarLivro();
            $editLivro->update($this->dadosForm);
            if ($editLivro->getResultado()) {
                $urlDestino = URL . "livros/index";
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dadosForm;
                $this->viewEditLivro();
            }
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Livro não encontrado.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $urlDestino = URL . "livros/index";
            header("Location: $urlDestino");
        }
    }
}
