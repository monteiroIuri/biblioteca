<?php
if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>

<!-- Modal Excluir Prateleira -->
<div class="modal fade" id="excluirPrateleira" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Prateleira</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir a {nomePrateleira}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                <button type="button" class="btn btn-danger">Sim</button>
            </div>
        </div>
    </div>
</div>