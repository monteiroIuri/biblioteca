<?php

//Modal prateleira
include_once 'modal_prateleira/cadastrarPrateleira.php';

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
if(isset($this->dados['crud'])){
    $prateleiras = $this->dados['crud']['prateleiras'];
    $tipos = $this->dados['crud']['tipos'];
    $livros = $this->dados['crud']['livros'];
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
            
            <section id="prateleiras" class="lista_impar album py-5">

                <div class="section-title">
                    <h1 class="py-5 display-5 text-center">Prateleiras</h1>
                </div>
                <div class="container">
                    <div class="d-flex">
                        <div class="pb-4">
                            <!-- Botao modal criar prateleira -->
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#criarPrateleira">
                                Cadastrar Prateleira
                            </button>
                        </div>  
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Prateleira</th>
                                    <th class="d-none d-lg-table-cell">Situação</th>
                                    <th class="text-center">Ações</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($prateleiras as $prateleira) {
                                    extract($prateleira);
                                    $cor_badge = "success";
                                    if($nome_situacao == "Inativa"){ 
                                        $cor_badge = "danger";
                                    }
                                ?>    
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td style="max-width: 160px; overflow: hidden;"><?php echo $nome_prateleira; ?></td>
                                    <td class="d-none d-lg-table-cell">
                                        <span class="badge bg-<?php echo $cor_badge; ?>"><?php echo $nome_situacao; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <!-- Botao modal editar prateleira -->
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarPrateleira">
                                            Editar
                                        </button>
                                        <?php echo "<a href='".URL."apagar-prateleira/index/$id' class='btn btn-outline-danger btn-sm' data-confirm='Excluir'>Apagar</a>";?>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

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
                        <a href="<?php echo URL; ?>prateleiras/index" class="item nav-link active">
                          <i class="fab fa-buromobelexperte fa-fw"></i>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo URL; ?>tipos/index" class="item nav-link">
                          <i class="fas fa-bookmark fa-fw"></i>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo URL; ?>livros/index" class="item nav-link">
                          <i class="fas fa-book-open fa-fw"></i>
                        </a>
                      </li>
                    </ul>
                    <hr>
                </div>
            </aside>