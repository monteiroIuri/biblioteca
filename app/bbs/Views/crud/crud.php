<?php

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

if(isset($this->dados['crud'])){
    $qnt_prateleiras = $this->dados['crud']['qnt_prateleiras'][0]['qnt_prateleiras'];
    $qnt_tipos = $this->dados['crud']['qnt_tipos'][0]['qnt_tipos'];
    $qnt_livros = $this->dados['crud']['qnt_livros'][0]['qnt_livros'];
}

?>

            <section class="py-5 text-center container">
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

            <section class="lista_impar album py-5">

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
                                foreach ($this->dados['crud']['prateleiras'] as $prateleira) {
                                    extract($prateleira);
                                ?>    
                                <tr>
                                    <th><?php echo $id; ?></th>
                                    <td><?php echo $nome_prateleira; ?></td>
                                    <td class="d-none d-lg-table-cell">
                                        <span class="badge bg-success"><?php echo $nome_situacao; ?></span>
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

            <section class="lista_par album py-5">
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
                                foreach ($this->dados['crud']['tipos'] as $tipo) {
                                    extract($tipo);
                                ?>   
                                <tr>
                                    <th><?php echo $id; ?></th>
                                    <td><?php echo $nome_tipo; ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $nome_prateleira; ?></td>
                                    <td class="d-none d-lg-table-cell">
                                        <span class="badge bg-success"><?php echo $nome_situacao; ?></span>
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

            <section class="lista_impar album py-5">
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
                                foreach ($this->dados['crud']['livros'] as $livro) {
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

            <!-- Modal Prateleiras -->
            <!-- Editar -->
            <div class="modal fade" id="editarPrateleira" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Prateleira</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <label for="nome_prateleira" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome_prateleira">

                                <label for="sitacao" class="form-label">Situação</label>
                                <select id="sitacao" class="form-select">
                                    <option>Disponível</option>
                                    <option>Indisponível</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-warning">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cadastrar -->
            <div class="modal fade" id="criarPrateleira" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nova Prateleira</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <label for="nome_prateleira" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome_prateleira">

                                <label for="sitacao" class="form-label">Situação</label>
                                <select id="sitacao" class="form-select">
                                    <option>Disponível</option>
                                    <option>Indisponível</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Excluir -->
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
            <!-- Fim Modal Prateleiras -->

            <!-- Modal Tipos -->
            <!-- Editar -->
            <div class="modal fade" id="editarTipo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Tipo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <label for="nome_tipo" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome_tipo">

                                <label for="prateleira" class="form-label">Prateleira</label>
                                <select id="prateleira" class="form-select">
                                    <option>Prateleira 1</option>
                                    <option>Prateleira 2</option>
                                </select>

                                <label for="sitacao" class="form-label">Situação</label>
                                <select id="sitacao" class="form-select">
                                    <option>Disponível</option>
                                    <option>Indisponível</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-warning">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cadastrar -->
            <div class="modal fade" id="criarTipo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Novo Tipo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <label for="nome_tipo" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome_tipo">

                                <label for="prateleira" class="form-label">Prateleira</label>
                                <select id="prateleira" class="form-select">
                                    <option>Prateleira 1</option>
                                    <option>Prateleira 2</option>
                                </select>

                                <label for="sitacao" class="form-label">Situação</label>
                                <select id="sitacao" class="form-select">
                                    <option>Disponível</option>
                                    <option>Indisponível</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Excluir -->
            <div class="modal fade" id="excluirTipo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluir Tipo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja excluir o tipo {nomeTipo}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                            <button type="button" class="btn btn-danger">Sim</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim Modal Tipos -->

            <!-- Modal Livros -->
            <!-- Editar -->
            <div class="modal fade" id="editarLivro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Livro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <label for="nome_livro" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome_livro">

                                <label for="nome_autor" class="form-label">Autor</label>
                                <input type="text" class="form-control" id="nome_autor">

                                <label for="tipo" class="form-label">Tipo</label>
                                <select id="tipo" class="form-select">
                                    <option>Ação</option>
                                    <option>Aventura</option>
                                    <option>Ficção</option>
                                    <option>Romance</option>
                                    <option>Comédia</option>
                                    <option>Biografia</option>
                                </select>

                                <label for="prateleira" class="form-label">Prateleira</label>
                                <select id="prateleira" class="form-select">
                                    <option>Prateleira 1</option>
                                    <option>Prateleira 2</option>
                                </select>

                                <label for="sitacao" class="form-label">Situação</label>
                                <select id="sitacao" class="form-select">
                                    <option>Disponível</option>
                                    <option>Indisponível</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-warning">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cadastrar -->
            <div class="modal fade" id="criarLivro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Novo Livro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <label for="nome_livro" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome_livro">

                                <label for="nome_autor" class="form-label">Autor</label>
                                <input type="text" class="form-control" id="nome_autor">

                                <label for="tipo" class="form-label">Tipo</label>
                                <select id="tipo" class="form-select">
                                    <option>Ação</option>
                                    <option>Aventura</option>
                                    <option>Ficção</option>
                                    <option>Romance</option>
                                    <option>Comédia</option>
                                    <option>Biografia</option>
                                </select>

                                <label for="prateleira" class="form-label">Prateleira</label>
                                <select id="prateleira" class="form-select">
                                    <option>Prateleira 1</option>
                                    <option>Prateleira 2</option>
                                </select>

                                <label for="sitacao" class="form-label">Situação</label>
                                <select id="sitacao" class="form-select">
                                    <option>Disponível</option>
                                    <option>Indisponível</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Excluir -->
            <div class="modal fade" id="excluirLivro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluir Livro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja excluir o livro {nomeLivro}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                            <button type="button" class="btn btn-danger">Sim</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim Modal Livros -->

