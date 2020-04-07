<?php

    class Professor
    {
        //Atributos - Características - Elementos BD
        private $matricula;
        private $nome;
        private $contato;
        private $endereco;
        private $email;
        private $cpf;
        
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
        
        public function getContato()
        {
            return $this->contato;
        }
        
        public function setContato($n)
        {
            $this->contato = $n;
        }
        
        public function getEndereco()
        {
            return $this->endereco;
        }
        
        public function setEndereco($n)
        {
            $this->endereco = $n;
        }
        
        public function getEmail()
        {
            return $this->email;
        }
        
        public function setEmail($n)
        {
            $this->email = $n;
        }
        
        public function getCPF()
        {
            return $this->cpf;
        }
        
        public function setCPF($n)
        {
            $this->cpf = $n;
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
            $sql = 'INSERT INTO professor (nome, matricula, contato, endereco, email, cpf) VALUES (?, ?, ?, ?, ?, ?)';
            //Preparar a ação no BD
            $stmtInserir = $conexao->prepare($sql);
            //Definir o valor dos parâmetros
            $stmtInserir->bindParam(1, $this->nome);
            $stmtInserir->bindParam(2, $this->matricula);
            $stmtInserir->bindParam(3, $this->contato);
            $stmtInserir->bindParam(4, $this->endereco);
            $stmtInserir->bindParam(5, $this->email);
            $stmtInserir->bindParam(6, $this->cpf);
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
            
            $sql = 'SELECT * FROM professor WHERE matricula = ?, nome = ?, contato = ?, endereco = ?, email = ?, cpf = ?';
            $stmtLeitura = $conexao->prepare($sql);
            $stmtLeitura->bindParam(1, $this->matricula);
            $stmtLeitura->bindParam(2, $this->nome);
            $stmtLeitura->bindParam(3, $this->contato);
            $stmtLeitura->bindParam(4, $this->endereco);
            $stmtLeitura->bindParam(5, $this->email);
            $stmtLeitura->bindParam(6, $this->cpf);    
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
            
            $sql = 'UPDATE professor SET nome = ?, endereco = ? WHERE matricula = ?';
            $stmtAtualizar = $conexao->prepare($sql);
            $stmtAtualizar->bindParam(1, $this->nome);
            $stmtAtualizar->bindParam(2, $this->matricula);
            $stmtAtualizar->bindParam(3, $this->contato);
            $stmtAtualizar->bindParam(4, $this->endereco);
            $stmtAtualizar->bindParam(5, $this->email);
            $stmtAtualizar->bindParam(6, $this->cpf);    
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
                
            $sql = 'DELETE FROM professor WHERE matricula = ?';
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
            
            $sql = 'SELECT * FROM professor';
            $stmtLista = $conexao->prepare($sql);
            $stmtLista->execute();
                
            $alunos = $stmtLista->fetchAll(PDO::FETCH_ASSOC);
            return $professor;
                
            }
            catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        }
        
        //JSON
        public function listaJson()
        {
            return json_encode(lista());
        }
        
        
    }

?>