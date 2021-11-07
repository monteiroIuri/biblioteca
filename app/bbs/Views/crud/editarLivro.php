<?php

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
if (isset($this->dados['form'])) {
    $valorForm = $this->dados['form'];
}

if (isset($this->dados['form'][0])) {
    $valorForm = $this->dados['form'][0];
}

?>
           <section class="album py-5">
                <div class="section-title">
                    <h1 class="py-5 display-5 text-center">Editar Livro</h1>
                </div>
                <div class="container">
                    <div class="d-flex">
                        <div class="">
                            <?php echo "<a href='".URL."livros/index' class='btn btn-outline-success'>Voltar</a>";?>
                        </div>  
                    </div>
                    <hr class="hr-title">

                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <form method="POST" action="">
                        <input name="id" type="hidden" id="id" value="<?php
                        if (isset($valorForm['id'])) {
                            echo $valorForm['id'];
                        }
                        ?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="mb-2" for="nome_prateleira"><span class="text-danger">*</span> Livro:</label>
                                <input name="nome_livro" type="text" class="form-control" id="nome_livro" placeholder="Livro"  value="<?php
                                if (isset($valorForm['nome_livro'])) {
                                    echo $valorForm['nome_livro'];
                                }
                                ?>" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2" for="autor"><span class="text-danger">*</span> Autor:</label>
                                <input name="autor" type="text" class="form-control" id="autor" placeholder="Autor"  value="<?php
                                if (isset($valorForm['autor'])) {
                                    echo $valorForm['autor'];
                                }
                                ?>" required autofocus>
                            </div>
                        </div>
                        <div class="col">
                            <label class="mb-2 mt-2" for="descricao"><span class="text-danger">*</span> Descrição:</label>
                            <textarea style="height: 125px;" name="descricao" type="text" class="form-control" id="descricao" placeholder="Descrição" required><?php 
                            if (isset($valorForm['descricao'])) { 
                                echo $valorForm['descricao'];
                                
                            }?></textarea>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="mb-2 mt-2" for="id_tipo"><span class="text-danger">*</span> Tipo:</label>
                                <select name="id_tipo" id="id_tipo" class="form-control">
                                    <?php
                                    foreach ($this->dados['select']['tipo'] as $tipo) {
                                        extract($tipo);
                                        if ((isset($valorForm['id_tipo'])) AND $valorForm['id_tipo'] == $id) {
                                            echo "<option value='$id' selected>$nome_tipo</option>";
                                        } else {
                                            echo "<option value='$id'>$nome_tipo</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2 mt-2" for="id_prateleira"><span class="text-danger">*</span> Prateleira:</label>
                                <select name="id_prateleira" id="id_prateleira" class="form-control">
                                    <?php
                                    foreach ($this->dados['select']['prat'] as $prat) {
                                        extract($prat);
                                        if ((isset($valorForm['id_prateleira'])) AND $valorForm['id_prateleira'] == $id) {
                                            echo "<option value='$id' selected>$nome_prateleira</option>";
                                        } else {
                                            echo "<option value='$id'>$nome_prateleira</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2 mt-2" for="id_sit_livro"><span class="text-danger">*</span> Situação:</label>
                                <select name="id_sit_livro" id="id_sit_livro" class="form-control">
                                    <?php
                                    foreach ($this->dados['select']['sit'] as $sit) {
                                        extract($sit);
                                        if ((isset($valorForm['id_sit_livro'])) AND $valorForm['id_sit_livro'] == $id) {
                                            echo "<option value='$id' selected>$nome_situacao</option>";
                                        } else {
                                            echo "<option value='$id'>$nome_situacao</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <p class="mt-4">
                            <span class="text-danger">*</span> Campo Obrigatório
                        </p>
                        <input name="EditLivro" type="submit" class="btn btn-warning" value="Salvar"> 

                    </form>
                </div>
            </section>>

            <aside>
                <div class="aside" >
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                      <li class="nav-item">
                        <a href="<?php echo URL; ?>crud/index" class="item nav-link" aria-current="page">
                          <i class="fas fa-tachometer fa-fw"></i>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo URL; ?>prateleiras/index" class="item nav-link">
                          <i class="fab fa-buromobelexperte fa-fw"></i>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo URL; ?>tipos/index" class="item nav-link">
                          <i class="fas fa-bookmark fa-fw"></i>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo URL; ?>livros/index" class="item nav-link active">
                          <i class="fas fa-book-open fa-fw"></i>
                        </a>
                      </li>
                    </ul>
                    <hr>
                </div>
            </aside>
