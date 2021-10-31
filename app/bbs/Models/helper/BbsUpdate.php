<?php

namespace App\bbs\Models\helper;

/**
 * A classe BbsUpdate é classe filha da classe BbsConn, atualiza os registros no banco de dados
 *
 * @author Iuri Monteiro
 */
class BbsUpdate extends BbsConn
{
    /** @var string $table Recebe o nome da tabela*/
    private $table;
    
    /** @var string $termos Recebe os termos*/
    private $termos;
    
    /** @var array $data Recebe os dados que serão salvos no banco de dados*/
    private $data;
    
    /** @var array $values Recebe os valores*/
    private $values = [];
    
    /** @var string $result Recebe o resultado*/
    private $result;
    
    /** @var object $update Recebe a instrução para atualizar a informação no banco de dados*/
    private $update;
    
    /** @var $query Recebe a query que será atualizada*/
    private $query;
    
    /** @var object $conn Recebe a conexão*/
    private $conn;

    /**
     * Recebe o resultado
     * @return string Retorna o resultado
     */
    function getResult() {
        return $this->result;
    }
    
    /**
     * Metodo recebe a tabela, dados, termos e a parseString
     * @param string $table Recebe a tabela
     * @param array $data Recebe os dados
     * @param string $termos Recebe os termos
     * @param type $parseString Recebe a parseString
     * @return void
     */
    public function exeUpdate($table, array $data, $termos = null, $parseString = null): void {
        $this->table = (string) $table;
        $this->data = $data;

        $this->termos = (string) $termos;

        parse_str($parseString, $this->values);

        $this->exeReplaceValues();
        $this->exeIntruction();
    }

    /** Metodo privado, só pode ser chamado dentro da classe
     * Metodo configura a forma como os valores serão atualizados na tabela do banco de dados
     */
    private function exeReplaceValues() {
        foreach ($this->data as $key => $value) {
            $values[] = $key . '=:' . $key;
        }
        $values = implode(', ', $values);

        $this->query = "UPDATE {$this->table} SET {$values} {$this->termos}";
    }

    /** Metodo privado, só pode ser chamado dentro da classe
     * Metodo executa a conexão para que a atualização na tabela seja feita
     */
    private function exeIntruction() {
        $this->connection();
        try {
            $this->update->execute(array_merge($this->data, $this->values));
            if ($this->update->rowCount() >= 1) {
                $this->result = true;
            } else {
                $this->result = false;
            }
        } catch (Exception $ex) {
            $this->result = null;
        }
    }

    private function connection() {
        $this->conn = $this->connect();
        $this->update = $this->conn->prepare($this->query);
    }

}
