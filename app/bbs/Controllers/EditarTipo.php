<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of EditarTipo
 *
 * @author Iuri Monteiro
 */
class EditarTipo 
{
    
    /** @var $dados Recebe as informações que serão enviadas para a View*/
    private $dados;
    
    /** @var $dadosForm Recebe as informações do formulário que serão enviadas para a Models*/
    private $dadosForm;
    
    /** @var $id Recebe a Id do usuário */
    private $id;

    /** Metodo para receber os dados da View e enviar para Models */
    public function index($id) {
        $this->id = (int) $id;

        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->id) AND (empty($this->dadosForm['EditTipo']))) {
            $viewTipo = new \App\bbs\Models\BbsEditarTipo();
            $viewTipo->viewTipo($this->id);
            if ($viewTipo->getResultado()) {
                $this->dados['form'] = $viewTipo->getResultadoBd();
                $this->viewEditTipo();
            } else {
                $urlDestino = URL . "tipos/index";
                header("Location: $urlDestino");
            }
        } else {
            $this->editTipo();
        }
    }

    /** Metodo privado, só pode ser chamado na classe
     * Metodo usado para carregar os botões, enviar as informações para a View e listar informações no dropdown do formulário
     */
    private function viewEditTipo() {

        $listSelect = new \App\bbs\Models\BbsEditarTipo();
        $this->dados['select'] = $listSelect->listSelect();

        $carregarView = new \Core\ConfigView("bbs/Views/crud/editarTipo", $this->dados);
        $carregarView->renderizar();
    }

    /** Metodo privado, só pode ser chamado na classe
     * Metodo usado para manter as informações no formulário e enviar para a Models para que a edição seja feita
     */
    private function editTipo() {
        if (!empty($this->dadosForm['EditTipo'])) {
            unset($this->dadosForm['EditTipo']);
            $editTipo = new \App\bbs\Models\BbsEditarTipo();
            $editTipo->update($this->dadosForm);
            if ($editTipo->getResultado()) {
                $urlDestino = URL . "tipos/index";
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dadosForm;
                $this->viewEditTipo();
            }
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Tipo não encontrado.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $urlDestino = URL . "tipos/index";
            header("Location: $urlDestino");
        }
    }
}
