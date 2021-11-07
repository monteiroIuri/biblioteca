<?php

namespace Core;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of Config
 *
 * @author Iuri Monteiro
 */
class CarregarPg
{

    private string $urlController;
    private string $urlMetodo;
    private string $urlParametro;
    private string $classe;
    private array $pgPublica;
   // private array $pgRestrita;


    /**
     * 
     * @param string $urlController Recebe da URL o nome da controller
     * @param string $urlMetodo Recebe da URL o método
     * @param string $urlParametro Recebe da URL o parâmetro
     */
    public function carregarPg($urlController = null, $urlMetodo = null, $urlParametro = null):void {
        $this->urlController = $urlController;
        $this->urlMetodo = $urlMetodo;
        $this->urlParametro = $urlParametro;

        $this->pgPublica();
        
        if (class_exists($this->classe)) {
            $this->carregarMetodo();
        } else {
            $this->urlController = $this->slugController(CONTROLLER);
            $this->urlMetodo = $this->slugMetodo(METODO);
            $this->urlParametro = "";
            $this->classe = "\\App\\bbs\\Controllers\\" . $this->urlController;
            $this->carregarMetodo();
        }        
    }
    
    private function carregarMetodo() {
        $classCarregar = new $this->classe();
        if(method_exists($classCarregar, $this->urlMetodo)){
            $classCarregar->{$this->urlMetodo}($this->urlParametro);
        }else{
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador " . EMAILADM . "!<br>");
        }        
    }
    
    private function pgPublica() {
        $this->pgPublica = ["AlugarLivro", "ApagarPrateleira", "Crud", "DevolverLivro", "Erro", "Home", "Livros", "Prateleiras", "Tipos", "ApagarTipo", "ApagarLivro", "EditarPrateleira", "EditarTipo", "EditarLivro"];
        
        if(in_array($this->urlController, $this->pgPublica)){
            $this->classe = "\\App\\bbs\\Controllers\\" . $this->urlController;
        }else{
           // $this->pgRestrita();
        }
    }
    
    /*private function pgRestrita() {
        $this->pgRestrita = [];
        if(in_array($this->urlController, $this->pgRestrita)){
            $this->verificarLogin();
        }else{
            $_SESSION['msg'] = "Erro: Página não encontrada!<br>";
            $urlDestino = URLADM . "login/index";
            header("Location: $urlDestino");
        }
    }
    
    private function verificarLogin() {
        if(isset($_SESSION['user_id']) AND isset($_SESSION['user_name']) AND isset($_SESSION['user_email'])){
            $this->classe = "\\App\\bbs\\Controllers\\" . $this->urlController;
        }else{
            $_SESSION['msg'] = "Erro: Para acessar a página realize o login!<br>";
            $urlDestino = URLADM . "login/index";
            header("Location: $urlDestino");
        }
    }*/

    private function slugController($slugController) {
        //Converter para minusculo
        $this->slugController = strtolower($slugController);
        //Converter o traço para espaço em braco
        $this->slugController = str_replace("-", " ", $this->slugController);
        //Converter a primeira letra de cada palavra para maiusculo
        $this->slugController = ucwords($this->slugController);
        //Retirar o espaço em braco
        $this->slugController = str_replace(" ", "", $this->slugController);

        return $this->slugController;
    }

    private function slugMetodo($slugMetodo) {
        $this->slugMetodo = $this->slugController($slugMetodo);
        //Converter para minusculo a primeira letra
        $this->slugMetodo = lcfirst($this->slugMetodo);

        return $this->slugMetodo;
    }  

}
