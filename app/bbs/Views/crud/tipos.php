<?php

//Modal Tipo
include_once 'modal_tipo/cadastrarTipo.php';

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

if(isset($this->dados['crud'])){
    $tipos = $this->dados['crud']['tipos'];
}

?>

            <section id="tipos" class="lista_par album py-5">
                <div class="section-title">
                    <h1 class="py-5 display-5 text-center">Tipos</h1>
                </div>

                <div class="container">
                    <div class="d-flex">
                        <!-- Botao modal criar tipo -->
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#criarTipo">
                            Cadastrar Tipo
                        </button>
                    </div>
                    <hr class="hr-title">
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th class="d-none d-sm-table-cell">Prateleira</th>
                                    <th class="d-none d-lg-table-cell">Situação</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($tipos as $tipo) {
                                    extract($tipo);
                                    $cor_badge = "success";
                                    if($nome_situacao == "Inativo"){ 
                                        $cor_badge = "danger";
                                    }
                                ?>   
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $nome_tipo; ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $nome_prateleira; ?></td>
                                    <td class="d-none d-lg-table-cell">
                                        <span class="badge bg-<?php echo $cor_badge; ?>"><?php echo $nome_situacao; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <?php echo "<a href='".URL."editar-tipo/index/$id' class='btn btn-outline-warning btn-sm'>Editar</a>";?>
                                        <?php echo "<a href='".URL."apagar-tipo/index/$id' class='btn btn-outline-danger btn-sm' data-confirm='Excluir'>Apagar</a>";?>
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
                        <a href="<?php echo URL; ?>prateleiras/index" class="item nav-link">
                          <i class="fab fa-buromobelexperte fa-fw"></i>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo URL; ?>tipos/index" class="item nav-link active">
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