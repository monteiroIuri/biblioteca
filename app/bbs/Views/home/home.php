<?php
if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
//var_dump($this->dados['bbs_livros']);
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
<?php
foreach ($this->dados['bbs_livros']['prateleiras'] as $prateleira) {
    $bgPrateleira = "prateleira_impar";
    $idprateleira = "prateleira".$prateleira['id']; 
    if ($prateleira['id'] % 2 == 0) {
        $bgPrateleira = "prateleira_par";
    }
    ?>    
        <section id="<?php echo $idprateleira;?>" class="<?php echo $bgPrateleira; ?> album py-5">
            <div class="section-title">
                <h1 class="py-5 display-5 text-center"><?php echo $prateleira['nome_prateleira']; ?></h1>
            </div>
            <div class="container">
    <?php
    foreach ($this->dados['bbs_livros']['tipos'] as $tipo) {
        if ($tipo['id_prateleira'] == $prateleira['id']) {
            ?>           
                <h2 class="py-5 fw-light"><?php echo $tipo['nome_tipo']; ?></h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">       
            <?php     
            foreach ($this->dados['bbs_livros']['livros'] as $livro) {
                if ($tipo['id_prateleira'] == $prateleira['id'] && $livro['id_tipo'] == $tipo['id']) {
                    ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                            <div class="card-body">
                                <p class="text-center"><?php echo $livro['nome_livro']; ?></p>
                                <p class="card-text"><?php echo $livro['descricao']; ?></p>
                                <p>- <?php echo $livro['autor']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                    </div>
                                    <small class="text-muted"><?php echo $livro['nome_situacao']; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
                </div>                  
            <?php
        }
    }
    ?>                     
            </div>     
        </section>       
<?php
}
?>           