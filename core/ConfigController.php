<?php

namespace Core;

if (!defined('47b6t8')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of ConfigController
 *
 * @author Iuri Monteiro
 */
class ConfigController extends Config {

    /** @var string $url Recebe a URL do .htaccess */
    private $url;

    /** @var array $urlConjunto Recebe a URL convertida para array */
    private $urlConjunto;

    /** @var string $urlController Recebe da URL o nome da CONTROLLER */
    private $urlController;

    /** @var string $urlParametro Recebe da URL o parâmetro */
    private $urlParametro;

    /** @var string $urlSlugController Recebe a CONTROLLER convertida para
      o formato do nome da classe */
    private $urlSlugController;

    /** @var array $format Recebe a URL convertida para array */
    private $format;

    /**
     * Receber a URL do .htaccess.
     * Validar a URL.
     */
    public function __construct() {
        $config = new \Core\Config();
        $config->config();
        if (!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
            //echo "URL: {$this->url} <br>";
            $this->limparUrl();
            //echo "URL Limpa: {$this->url} <br>";
            $this->urlConjunto = explode("/", $this->url);
            //var_dump($this->urlConjunto);
            if (isset($this->urlConjunto[0])) {
                $this->urlController = $this->slugController($this->urlConjunto[0]);
            } else {
                $this->urlController = CONTROLLER;
            }

            if (isset($this->urlConjunto[1])) {
                $this->urlParametro = $this->urlConjunto[1];
            } else {
                $this->urlParametro = "";
            }
        } else {
            $this->urlController = CONTROLLER;
            $this->urlParametro = "";
        }
        //echo "Controller: {$this->urlController} - Paramentro: {$this->urlParamentro}<br>";
    }

    /**
     * Limpar a URL, eliminando as TAGS, os espaços em branco, retirar a barra
      no final da URL e retirar os caracteres especiais
     * 
     * @return void
     */
    private function limparUrl() {
        //Eliminar as tags
        $this->url = strip_tags($this->url);
        //Eliminar espaços em branco
        $this->url = trim($this->url);
        //Eliminar a barra no final da URL
        $this->url = rtrim($this->url, "/");

        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
        $this->url = strtr(utf8_decode($this->url), utf8_decode($this->format['a']), $this->format['b']);
    }

    /**
     * Converter o valor obtido da URL "sobre-empresa" para "SobreEmpresa".
     * Utilizado as funções para converter tudo para minúsculo, converter o 
      traço para espaço, converter a primera letra de cada palavra para maiúsculo
      e retirar os espaços em branco.
     * @param string $slugController Nome da classe
     * @return string Retorna a controller "sobre-empresa" convertido para o 
      nome da classe "SobreEmpresa"
     */
    private function slugController($slugController) {
        //Converter para minusculo
        $this->urlSlugController = strtolower($slugController);
        //Converter o traço para espaço em braco
        $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);
        //Converter a primeira letra de cada palavra para maiusculo
        $this->urlSlugController = ucwords($this->urlSlugController);
        //Retirar o espaço em braco
        $this->urlSlugController = str_replace(" ", "", $this->urlSlugController);
        return $this->urlSlugController;
    }

    public function carregar() {
        $classe = "\\App\\bbs\\Controllers\\" . $this->urlController;
        $classeCarregar = new $classe();
        $classeCarregar->index();
    }

}
