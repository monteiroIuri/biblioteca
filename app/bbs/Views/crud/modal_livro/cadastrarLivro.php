<?php
if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>
<!-- Modal Cadastrar Novo Livro -->
<div class="modal fade" id="criarLivro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php 
                $situacaoLivro = $this->dados['crud']['sit_livro'];
                $tipos = $this->dados['crud']['tipos'];
                $prateleiras = $this->dados['crud']['prateleiras'];
            ?>
            <form method="POST">   
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Livro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nome_livro" id="nome_livro" placeholder="Nome" required>
                            <label for="nome_livro" >Nome</label>
                        </div>   
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor" required>
                            <label for="autor" >Autor</label>
                        </div>   
                        <div class="form-floating mb-3">    
                            <textarea class="form-control" name="descricao" id="descricao" style="height: 125px; " placeholder="Descrição" required></textarea>
                            <label for="descricao">Descrição</label>
                        </div>     
                        <div class="form-floating mb-3"> 
                            <select name="id_tipo" id="id_tipo" class="form-select" required>
                                <option value="" selected>Selecione</option>
                                <?php
                                foreach ($tipos as $tipo) {
                                    extract($tipo);
                                    echo "<option value='$id'>$nome_tipo</option>";
                                }
                                ?>
                            </select>
                            <label for="id_tipo" >Tipo</label>
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
                            <label for="id_prateleira">Prateleira</label>
                        </div> 
                        <div class="form-floating mb-3"> 
                            <select name="id_sit_livro" id="id_sit_livro" class="form-select" required>
                                <option value="" selected>Selecione</option>
                                <?php
                            foreach ($situacaoLivro as $situacao) {
                                extract($situacao);
                                echo "<option value='$id'>$nome_situacao</option>";
                            }
                            ?>
                            </select>
                            <label for="id_sit_livro" >Situação</label>
                        </div>     
                    <p>
                        <span class="text-danger">* </span>Todos os campos são obrigatórios!
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                    <input name="CadLivro" type="submit" class="btn btn-success" value="Cadastrar">
                </div>
            <form method="POST">      
        </div>
    </div>
</div>