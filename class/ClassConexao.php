<?php 

    abstract class ClassConexao{
        #Conexao com o BANCO DE DADOS
        protected function conectaBD(){
            try {
                $Con = new PDO("mysql:host=localhost;dbname=crud","root","");
                return $Con;
            } catch (PDOException $erro) {
                return $erro->getMessage();
            }
            
        }
    }
?> 