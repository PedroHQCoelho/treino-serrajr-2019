<?php

    //Se houver ação
    if( ! empty($_POST['action']))
    {
        $result ='';
        
        switch($_POST['action'])
        {
                
            case 'NOVO_ALUNO';
                //Adicionar Biblioteca
                include('../model/Aluno.php');
                
                //Criar novo modelo de aluno
                $novoAluno = new Aluno();
                //Define o valor de nome
                $novoAluno->setNome($_POST['nome']);
                //Salva no BD
                $novoAluno->create();
                //Resultado quer dizer que funcionou a ação
                $result = $_POST['action'];
                echo json_encode(array('result' => $result));
                break;
        
        case 'LISTA_ALUNOS';
                include('../model/Aluno.php');
                $novoAluno = new Aluno();
                echo $novoAluno->listaJson();
                break;
                
        case 'DELETA_ALUNO';
                include('../model/Aluno.php');
                $novoAluno = new Aluno();
                $novoAluno->setMatricula($_POST['matricula']);
                $novoAluno->delete();
                $result = $_POST['action'];
                echo json_encode(array('result' => $result));
                break;
                
        }
        
        
    }
    else
    {
        echo 'Não existe ação';
    }

?>