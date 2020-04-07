<?php

    $usuario = 'root';
    $senha = '';

    try
    {
        $conexao = new PDO('mysql:host=localhost;dbname=iprjdb', $usuario, $senha);

    }
    catch(PDOExpection $e)
    {
        echo $e->getMessage();
    }

?>