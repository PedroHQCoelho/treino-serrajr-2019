<?php

    class Aluno
    {
        //Atributos - Características - Elementos BD
        private $matricula;
        private $nome;
        
        //Getters & Setters
        public function getMatricula()
        {
            return $this->matricula;
        }
        
        public function setMatricula($n)
        {
            $this->matricula = $n;
        }
        
        public function getNome()
        {
            return $this->nome;
        }
        
        public function setNome($n)
        {
            $this->nome = $n;
        }
        
        //Create
        public function create()
        {
            //Tente Executar
            try
            {
                //Conectar ao BD
            include('Database.php');
            
            //Definir a ação
            $sql = 'INSERT INTO aluno (nome) VALUES (?)';
            //Preparar a ação no BD
            $stmtInserir = $conexao->prepare($sql);
            //Definir o valor dos parâmetros
            $stmtInserir->bindParam(1, $this->nome);
            //Executar ação no BD
            $stmtInserir->execute();
            }
            catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        
        }
        
        //Read
        public function read()
        {
            //Tente Executar
            try
            {
                include('Database.php');
            
            $sql = 'SELECT * FROM aluno WHERE matricula = ?';
            $stmtLeitura = $conexao->prepare($sql);
            $stmtLeitura->bindParam(1, $this->matricula);
            $stmtLeitura->execute();
            
            //Converter retorno para variável
            $dado = $stmtLeitura->fetch(PDO::FETCH_ASSOC);
            $this->nome = $dado['nome'];
            }
             catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        }
        
        //Update
        public function update()
        {
            try
            {
                include('Database.php');
            
            $sql = 'UPDATE aluno SET nome = ?';
            $stmtAtualizar = $conexao->prepare($sql);
            $stmtAtualizar->bindParam(1, $this->nome);
            $stmtAtualizar->bindParam(2, $this->matricula);
            $stmtAtualizar->execute();
            }
            catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        }
        
        //Delete
        public function delete()
        {
            try
            {
                include('Database.php');
                
            $sql = 'DELETE FROM aluno WHERE matricula = ?';
            $stmtDeletar = $conexao->prepare($sql);
            $stmtDeletar->bindParam(1, $this->matricula);
            $stmtDeletar->execute();
            }
            catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        }
        
        //Listagem
        public function lista()
            {
            try
            {
                include('Database.php');
            
            $sql = 'SELECT * FROM aluno';
            $stmtLista = $conexao->prepare($sql);
            $stmtLista->execute();
                
            $alunos = $stmtLista->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
                
            }
            catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        }
        
        //JSON
        public function listaJson()
        {
            return json_encode($this->lista());
        }
        
        
    }

?>