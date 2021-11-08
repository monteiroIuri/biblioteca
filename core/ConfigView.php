<?php

namespace Core;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Carregar as páginas da View
 *
 * @author Iuri Monteiro
 */
class ConfigView
{
    /** @var string $nome Recebe o endereço da VIEW que deve ser carregada */
    private string $nome;

    /** @var array $dados Recebe os dados que a VIEW deve receber */
    private array $dados;
    
    /**
     * Receber o endereço da VIEW e os dados.
     * @param string $nome Endereço da VIEW que deve ser carregada
     * @param array $dados Dados que a VIEW deve receber
     */
    public function __construct($nome, array $dados) {
        $this->nome = $nome;
        $this->dados = $dados;
    }
    
    /**
     * Carregar a VIEW
     * Verificar se o arquivo existe e carregar caso exista, se não existir,
      para o carregamento
     * 
     * @return void
     */
    public function renderizar() {
        
        if(!file_exists('app/' . $this->nome . '.php')){
            echo "Página não encontrada: {$this->nome}<br>";
            die("Página não encontrada!");
        }
        
        include 'app/bbs/Views/include/head.php';
        include 'app/bbs/Views/include/menu.php';
        include 'app/' . $this->nome . '.php';
        include 'app/bbs/Views/include/footer.php';  
               
    }
}
