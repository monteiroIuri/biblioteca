<?php

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

?>

            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light display-4">Bem vindo a Biblioteca</h1>
                        <p class="lead text-muted">
                            Cadastre, veja, edite e delete livros.
                        <p>
                            <a href="#prateleira1" class="btn btn-primary my-2">Livros</a>
                            <a href="<?php echo URL; ?>crud" class="btn btn-secondary my-2">CRUD</a>
                        </p>
                    </div>
                </div>
            </section>

            <section id="prateleira1" class="prateleira_impar album py-5">
                <div class="section-title">
                    <h1 class="py-5 display-5 text-center">Prateleira 1</h1>
                </div>

                <div class="container">

                    <h2 class="py-5 fw-light">Aventura</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <h2 class="py-5 fw-light">Ação</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">    
                        <h2 class="py-5 fw-light">Ficção</h2>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                    <div class="card-body">
                                        <p class="text-center">Nome Do Livro</p>
                                        <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                        <p>- Autor do Livro</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                            </div>
                                            <small class="text-muted">Disponível</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                    <div class="card-body">
                                        <p class="text-center">Nome Do Livro</p>
                                        <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                        <p>- Autor do Livro</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                            </div>
                                            <small class="text-muted">Disponível</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                    <div class="card-body">
                                        <p class="text-center">Nome Do Livro</p>
                                        <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                        <p>- Autor do Livro</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                            </div>
                                            <small class="text-muted">Disponível</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <section id="prateleira2" class="prateleira_par album py-5">
                <div class="section-title">
                    <h1 class="py-5 display-5 text-center">Prateleira 2</h1>
                </div>

                <div class="container">

                    <h2 class="py-5 fw-light">Romance</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <h2 class="py-5 fw-light">Comédia</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                <div class="card-body">
                                    <p class="text-center">Nome Do Livro</p>
                                    <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                    <p>- Autor do Livro</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                        </div>
                                        <small class="text-muted">Disponível</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">    
                        <h2 class="py-5 fw-light">Biografia</h2>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                    <div class="card-body">
                                        <p class="text-center">Nome Do Livro</p>
                                        <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                        <p>- Autor do Livro</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                            </div>
                                            <small class="text-muted">Disponível</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                    <div class="card-body">
                                        <p class="text-center">Nome Do Livro</p>
                                        <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                        <p>- Autor do Livro</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                            </div>
                                            <small class="text-muted">Disponível</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                                    <div class="card-body">
                                        <p class="text-center">Nome Do Livro</p>
                                        <p class="card-text">Um breve resumo sobre o livro que traga interesse para o leitor</p>
                                        <p>- Autor do Livro</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                            </div>
                                            <small class="text-muted">Disponível</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>