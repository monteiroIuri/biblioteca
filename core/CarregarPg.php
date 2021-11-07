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
class Config
{
     /**
     * Possui as CONSTANTES com as configurações.
     * Configurações de endereço do projeto.
     * Página principal do projeto.
     * Credenciais de acesso ao Banco de Dados.
     * E-mail do Administrador.
     * 
     * @return void
     */
    protected function config() {
        //Endereços do projeto
        define('URL', 'http://localhost/projetos/biblioteca/');
        
        //Páginas principais
        define('CONTROLLER', 'Home');
        define('METODO', 'index');
        define('CONTROLLERERRO', 'Erro');
        
        //Credenciais de acesso ao Banco de Dados
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'biblioteca');
        define('PORT', 3306);
        
        //Email do Administrador
        define('EMAILADM', 'iurigms@gmail.com');
    }

}
