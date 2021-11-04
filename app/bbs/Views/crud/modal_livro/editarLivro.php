<?php
if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>

<!-- Modal Editar Livro -->
<div class="modal fade" id="editarLivro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nome_livro" placeholder="Nome">
                        <label for="nome_livro" >Nome</label>
                    </div>   
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nome_autor" placeholder="Autor">
                        <label for="nome_autor" >Autor</label>
                    </div>   
                    <div class="form-floating mb-3">    
                        <textarea class="form-control" id="descricao" style="height: 125px; " placeholder="Descrição"></textarea>
                        <label for="descricao">Descrição</label>
                    </div>     
                    <div class="form-floating mb-3"> 
                        <select id="tipo" class="form-select">
                            <option>Ação</option>
                            <option>Aventura</option>
                            <option>Ficção</option>
                            <option>Romance</option>
                            <option>Comédia</option>
                            <option>Biografia</option>
                        </select>
                        <label for="tipo" >Tipo</label>
                    </div>  
                    <div class="form-floating mb-3">     
                        <select id="prateleira" class="form-select">
                            <option>Prateleira 1</option>
                            <option>Prateleira 2</option>
                        </select>
                        <label for="prateleira">Prateleira</label>
                    </div> 
                    <div class="form-floating mb-3"> 
                        <select id="sitacao" class="form-select">
                            <option>Disponível</option>
                            <option>Indisponível</option>
                        </select>
                        <label for="sitacao" >Situação</label>
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