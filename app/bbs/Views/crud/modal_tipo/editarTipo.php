<?php
if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>

<!-- Modal Editar Tipo -->
<div class="modal fade" id="editarTipo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Tipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3"> 
                        <input type="text" class="form-control" id="nome_tipo" placeholder="Nome">
                        <label for="nome_tipo" class="form-label">Nome</label>
                    </div>     
                    <div class="form-floating mb-3"> 
                        <select id="prateleira" class="form-select">
                            <option>Prateleira 1</option>
                            <option>Prateleira 2</option>
                        </select>
                        <label for="prateleira" class="form-label">Prateleira</label>
                    </div> 
                    <div class="form-floating mb-3"> 
                        <select id="sitacao" class="form-select">
                            <option>Disponível</option>
                            <option>Indisponível</option>
                        </select>
                        <label for="sitacao" class="form-label">Situação</label>
                    </div>    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning">Editar</button>
            </div>
        </div>
    </div>
</div>