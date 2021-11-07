<?php
//Modal prateleira
include_once 'modal_prateleira/cadastrarPrateleira.php';
include_once 'modal_prateleira/editarPrateleira.php';
include_once 'modal_prateleira/deletarPrateleira.php';
//Modal Tipo
include_once 'modal_tipo/cadastrarTipo.php';
include_once 'modal_tipo/editarTipo.php';
include_once 'modal_tipo/deletarTipo.php';
//Modal Livros
include_once 'modal_livro/cadastrarLivro.php';
include_once 'modal_livro/editarLivro.php';
include_once 'modal_livro/deletarLivro.php';

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

if(isset($this->dados['crud'])){
    $qnt_prateleiras = $this->dados['crud']['qnt_prateleiras'][0]['qnt_prateleiras'];
    $qnt_tipos = $this->dados['crud']['qnt_tipos'][0]['qnt_tipos'];
    $qnt_livros = $this->dados['crud']['qnt_livros'][0]['qnt_livros'];
    $prateleiras = $this->dados['crud']['prateleiras'];
    $tipos = $this->dados['crud']['tipos'];
    $livros = $this->dados['crud']['livros'];
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

            <section id="dashboard" class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light display-4">CRUD - Biblioteca</h1>
                        <p class="lead text-muted">
                            Cadastre, veja, edite e delete prateleiras, tipos e livros.
                        <div class="container p-1">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <div class="">
                                    <div class="card bg-success text-white">
                                        <div class="card-body">
                                            <div class="card-body-value">
                                                <i class="fas fa-book-open fa-3x"></i>
                                                <h2 class="lead"><?php echo $qnt_livros;?></h2>
                                            </div>
                                            <h6 class="card-title">Livros</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <div class="card-body-value">
                                                <i class="fab fa-buromobelexperte fa-3x"></i>
                                                <h2 class="lead"><?php echo $qnt_prateleiras;?></h2>
                                            </div>
                                            <h6 class="card-title">Prateleiras</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="card bg-warning text-white">
                                        <div class="card-body">
                                            <div class="card-body-value">
                                                <i class="fas fa-bookmark fa-3x"></i>
                                                <h2 class="lead"><?php echo $qnt_tipos;?></h2>
                                            </div>    
                                            <h6 class="card-title">Tipos</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <aside>
                    <div class="aside" >
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                          <li class="nav-item">
                            <a href="#dashboard" class="nav-link" aria-current="page">
                              <i class="fas fa-tachometer fa-fw"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#prateleiras" class="nav-link">
                              <i class="fab fa-buromobelexperte fa-fw"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#tipos" class="nav-link">
                              <i class="fas fa-bookmark fa-fw"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#livros" class="nav-link">
                              <i class="fas fa-book-open fa-fw"></i>
                            </a>
                          </li>
                        </ul>
                        <hr>
                    </div>
                </aside>
            </section>

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
                                    <th><?php echo $id; ?></th>
                                    <td style="max-width: 160px; overflow: hidden;"><?php echo $nome_prateleira; ?></td>
                                    <td class="d-none d-lg-table-cell">
                                        <span class="badge bg-<?php echo $cor_badge; ?>"><?php echo $nome_situacao; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <!-- Botao modal editar prateleira -->
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarPrateleira">
                                            Editar
                                        </button>
                                        <!-- Botao modal excluir prateleira -->
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#excluirPrateleira">
                                            Excluir
                                        </button>
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

            <section id="tipos" class="lista_par album py-5">
                <div class="section-title">
                    <h1 class="py-5 display-5 text-center">Tipos</h1>
                </div>

                <div class="container">
                    <div class="d-flex">
                        <div class="pb-4">
                            <!-- Botao modal criar tipo -->
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#criarTipo">
                                Cadastrar Tipo
                            </button>
                        </div>  
                    </div>
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
                                    <th><?php echo $id; ?></th>
                                    <td><?php echo $nome_tipo; ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $nome_prateleira; ?></td>
                                    <td class="d-none d-lg-table-cell">
                                        <span class="badge bg-<?php echo $cor_badge; ?>"><?php echo $nome_situacao; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <!-- Botao modal editar tipo -->
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarTipo">
                                            Editar
                                        </button>
                                        <!-- Botao modal excluir tipo -->
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#excluirTipo">
                                            Excluir
                                        </button>
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

            <section id="livros" class="lista_impar album py-5">
                <div class="section-title">
                    <h1 class="py-5 display-5 text-center">Livros</h1>
                </div>

                <div class="container">
                    <div class="d-flex">
                        <div class="pb-4">
                            <!-- Botao modal criar livro -->
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#criarLivro">
                                Cadastrar Livro
                            </button>
                        </div>  
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th class="d-none d-sm-table-cell">Autor</th>
                                    <th class="d-none d-sm-table-cell">Tipo</th>
                                    <th class="d-none d-sm-table-cell">Prateleira</th>
                                    <th class="d-none d-lg-table-cell">Situação</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($livros as $livro) {
                                    extract($livro);
                                    $cor_badge = "success";
                                    if($nome_situacao == "Indisponível"){ //gambi
                                        $cor_badge = "danger";
                                    }
                                ?>  
                                <tr>
                                    <th><?php echo $id; ?></th>
                                    <td><?php echo $nome_livro; ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $autor; ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $nome_tipo; ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $nome_prateleira; ?></td>
                                    <td class="d-none d-lg-table-cell">
                                        <span class="badge bg-<?php echo $cor_badge; ?>"><?php echo $nome_situacao; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <!-- Botao modal editar livro -->
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarLivro">
                                            Editar
                                        </button>
                                        <!-- Botao modal excluir livro -->
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#excluirLivro">
                                            Excluir
                                        </button>
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