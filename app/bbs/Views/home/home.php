<?php
if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
//var_dump($this->dados['bbs_livros']);

if(isset($this->dados['bbs_livros'])){
    $prateleiras = $this->dados['bbs_livros']['prateleiras'];
    $tipos = $this->dados['bbs_livros']['tipos'];
    $livros = $this->dados['bbs_livros']['livros'];
}
?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light display-4">Bem vindo a Biblioteca</h1>
            <p class="lead text-muted">
                Veja, alugue e devolva livros.
            <p>
                <a href="#prateleira1" class="btn btn-primary my-2">Livros</a>
                <a href="<?php echo URL; ?>crud" class="btn btn-secondary my-2">CRUD</a>
            </p>
        </div>
    </div>
</section>
<?php

foreach ($prateleiras as $prateleira) {
    extract($prateleira);
    $bgPrateleira = "prateleira_impar";
    $idprateleira = "prateleira".$prateleira['id']; 
    if ($prateleira['id'] % 2 == 0) {
        $bgPrateleira = "prateleira_par";
    }
    ?>    
        <section id="<?php echo $idprateleira;?>" class="<?php echo $bgPrateleira; ?> album py-5">
            <div class="section-title">
                <h1 class="py-5 display-5 text-center"><?php echo $nome_prateleira; ?></h1>
            </div>
            <div class="container">
    <?php
    foreach ($tipos as $tipo) {
        if ($tipo['id_prateleira'] == $prateleira['id']) {
            extract($tipo);
            ?>           
                <h2 class="py-5 fw-light"><?php echo $tipo['nome_tipo']; ?></h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">       
            <?php     
            foreach ($livros as $livro) {
                if ($tipo['id_prateleira'] == $prateleira['id'] && $livro['id_tipo'] == $tipo['id']) {
                    extract($livro);
                    ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="<?php echo URL; ?>app/bbs/assets/images/livros/livros.jpg">
                            <div class="card-body">
                                <p class="text-center"><?php echo $nome_livro; ?></p>
                                <p class="card-text"><?php echo $descricao; ?></p>
                                <p>- <?php echo $autor; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <?php 
                                        if($nome_situacao == "Disponível"){
                                        ?>    
                                        <a href="<?php echo URL; ?>alugar-livro/index?situacao=<?php echo $id; ?>"><button type="button" class="btn btn-sm btn-outline-primary">Alugar</button></a>
                                        <button disabled type="button" class="btn btn-sm btn-outline-secondary">Devolver</button>
                                    </div>
                                    <small class="text-success"><?php echo $nome_situacao; ?></small>   
                                        <?php 
                                        } else {
                                        ?>
                                        <button disabled type="button" class="btn btn-sm btn-outline-secondary">Alugar</button>
                                        <a href="<?php echo URL; ?>devolver-livro/index?situacao=<?php echo $id; ?>"><button type="button" class="btn btn-sm btn-outline-primary">Devolver</button></a>
                                        
                                    </div>
                                    <small class="text-danger"><?php echo $nome_situacao; ?></small>
                                    <?php 
                                        }
                                    ?>
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