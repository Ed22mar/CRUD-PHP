<?php
include("ClassConexao.php");

#Prepared Statement
class ClassCrud extends ClassConexao{

    private $Crud;
    private $Contador;

    #preparacao das declarativas
    private function PreparedStatements($Query,$Parametros){
        $this->CountParametros($Parametros);
        $this->Crud=$this->conectaBD()->prepare($Query);
        if($this->Contador > 0){
            for ($i=1; $i <=$this->Contador; $i++) { 
                $this->Crud->bindValue($i,$Parametros[$i-1]);
            }
        }
    }
    #Contador de Parametros
    private function CountParametros($Parametros){
        $this->Contador=count($Parametros);
    }
    #insert into data base
    public function insertBD($Tabela,$Condicao,$Parametros){
        $this->PreparedStatements("INSER INTO{$Tabela} VALUES({$Condicao})",$Parametros);
        return $this->Crud;
    }
}

?>