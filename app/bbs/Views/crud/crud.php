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
                        </p>
                        <p class="text-muted">
                            Navegue pelo CRUD da Biblioteca através do menu superior, menu lateral ou botões abaixo.
                        </p>
                        <div class="container p-1">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <a href="<?php echo URL; ?>livros/index" class="botao_dashboard">
                                    <div class="card bg-success text-white">
                                        <div class="card-body">
                                            <div class="card-body-value">
                                                <i class="fas fa-book-open fa-3x"></i>
                                                <h2 class="lead"><?php echo $qnt_livros;?></h2>
                                            </div>
                                            <h6 class="card-title">Livros</h6>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?php echo URL; ?>prateleiras/index" class="botao_dashboard">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <div class="card-body-value">
                                                <i class="fab fa-buromobelexperte fa-3x"></i>
                                                <h2 class="lead"><?php echo $qnt_prateleiras;?></h2>
                                            </div>
                                            <h6 class="card-title">Prateleiras</h6>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?php echo URL; ?>tipos/index" class="botao_dashboard">
                                    <div class="card bg-warning text-white">
                                        <div class="card-body">
                                            <div class="card-body-value">
                                                <i class="fas fa-bookmark fa-3x"></i>
                                                <h2 class="lead"><?php echo $qnt_tipos;?></h2>
                                            </div>    
                                            <h6 class="card-title">Tipos</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <aside>
                <div class="aside" >
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                      <li class="nav-item">
                        <a href="<?php echo URL; ?>crud/index" class="item nav-link active" aria-current="page">
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
                        <a href="<?php echo URL; ?>livros/index" class="item nav-link">
                          <i class="fas fa-book-open fa-fw"></i>
                        </a>
                      </li>
                    </ul>
                    <hr>
                </div>
            </aside>