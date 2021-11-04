<?php
if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>
<!-- Modal Cadastrar Novo Tipo -->
<div class="modal fade" id="criarTipo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php 
                $situacaoTipo = $this->dados['crud']['sit_tipo'];
                $prateleiras = $this->dados['crud']['prateleiras'];
            ?>
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Tipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3"> 
                        <input name="nome_tipo" type="text" class="form-control" id="nome_tipo" placeholder="Nome" required>
                        <label for="nome_tipo" class="form-label">Nome</label>
                    </div>     
                    <div class="form-floating mb-3"> 
                        <select name="id_prateleira" id="id_prateleira" class="form-select" required>
                            <option value="" selected>Selecione</option>
                            <?php
                            foreach ($prateleiras as $prateleira) {
                                extract($prateleira);
                                echo "<option value='$id'>$nome_prateleira</option>";
                            }
                            ?>
                        </select>
                        <label for="id_prateleira" class="form-label">Prateleira</label>
                    </div> 
                    <div class="form-floating mb-3"> 
                        <select name="id_sit_tipo" id="id_sit_tipo" class="form-select" required>
                            <option value="" selected>Selecione</option>
                            <?php
                            foreach ($situacaoTipo as $situacao) {
                                extract($situacao);
                                echo "<option value='$id'>$nome_situacao</option>";
                            }
                            ?>
                        </select>
                        <label for="id_sit_tipo" class="form-label">Situação</label>
                    </div>    
                    <p>
                        <span class="text-danger">* </span>Todos os campos são obrigatórios!
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                    <input name="CadTipo" type="submit" class="btn btn-success" value="Cadastrar">
                </div>
            </form>    
        </div>
    </div>
</div>
