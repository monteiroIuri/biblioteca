<?php

namespace App\bbs\Models\helper;


/**
 * A classe BbsDelete é classe filha da classe BbsConn, deleta registros no banco de dados
 *
 * @author Iuri Monteiro
 */
class BbsDelete extends BbsConn
{
    /** @var string $table Recebe o nome da tabela*/
    private $table;
    
    /** @var string $termos Recebe os termos que serão deletados*/
    private $termos;
    
    /** @var array $values Recebe os valores que serão deletados*/
    private $values = [];
    
    /** @var string $result Recebe o resultado*/
    private $result;
    
    /** @var object $delete Recebe o objeto a ser deletado*/
    private $delete;
    
    /** @var $query Recebe a Query com a instrução que deve ser executada*/
    private $query;
    
    /** @var object $conn Recebe a conexão*/
    private $conn;
    
    /**
     * Retorna o resultado da exclusão
     * @return string Retorna o resultado
     */
    function getResult() {
        return $this->result;
    }
    
    /**
     * Metodo recebe o nome da tabela, termos e parsestring a serem excluidos do banco de dados
     * @param string $table
     * @param string $termos
     * @param type $parseString
     * @return void
     */
    public function exeDelete($table, $termos, $parseString): void {
        $this->table = (string) $table;        
        $this->termos = (string) $termos;        
        parse_str($parseString, $this->values);
        
        $this->exeIntruction();
    }
    
    /** Metodo privado, só pode ser chamado dentro da classe
     * Metodo configura a forma como os valores serão excluidos na tabela do banco de dados
     */
    private function exeIntruction() {
        $this->query = "DELETE FROM {$this->table} {$this->termos}";
        $this->connection();
        try {
            $this->delete->execute($this->values);
            if($this->delete->rowCount() >= 1){
                $this->result = true;
            }else{
                $this->result = false;
            }            
        } catch (Exception $ex) {
            $this->result = false;
        }
    }
    
    /** Metodo privado, só pode ser chamado dentro da classe
     * Metodo executa a conexão para que o cadastro no banco de dados seja feito
     */
    private function connection() {
        $this->conn = $this->connect();
        $this->delete = $this->conn->prepare($this->query);
    }

    
}