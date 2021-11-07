<?php

namespace App\bbs\Controllers;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of EditarPrateleira
 *
 * @author Iuri Monteiro
 */
class EditarPrateleira 
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
        if (!empty($this->id) AND (empty($this->dadosForm['EditPratileira']))) {
            $viewPrat = new \App\bbs\Models\BbsEditarPrateleira();
            $viewPrat->viewPrateleira($this->id);
            if ($viewPrat->getResultado()) {
                $this->dados['form'] = $viewPrat->getResultadoBd();
                $this->viewEditPrat();
            } else {
                $urlDestino = URL . "prateleiras/index";
                header("Location: $urlDestino");
            }
        } else {
            $this->editPrat();
        }
    }

    /** Metodo privado, só pode ser chamado na classe
     * Metodo usado para carregar os botões, enviar as informações para a View e listar informações no dropdown do formulário
     */
    private function viewEditPrat() {

        $listSelect = new \App\bbs\Models\BbsEditarPrateleira();
        $this->dados['select'] = $listSelect->listSelectSit();

        $carregarView = new \Core\ConfigView("bbs/Views/crud/editarPrateleira", $this->dados);
        $carregarView->renderizar();
    }

    /** Metodo privado, só pode ser chamado na classe
     * Metodo usado para manter as informações no formulário e enviar para a Models para que a edição seja feita
     */
    private function editPrat() {
        if (!empty($this->dadosForm['EditPratileira'])) {
            unset($this->dadosForm['EditPratileira']);
            $editPrat = new \App\bbs\Models\BbsEditarPrateleira();
            $editPrat->update($this->dadosForm);
            if ($editPrat->getResultado()) {
                $urlDestino = URL . "prateleiras/index";
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dadosForm;
                $this->viewEditPrat();
            }
        } else {
            $_SESSION['msg'] = "<div class='mt-2 container text-center alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Erro:</strong> Prateleira não encontrada.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
            $urlDestino = URL . "prateleiras/index";
            header("Location: $urlDestino");
        }
    }
}
