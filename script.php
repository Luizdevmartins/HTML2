<?php
    ini_set("display_errors", 1);
    ini_set("display_startup_errors",1);
    error_reporting(E_ALL);
    //Criando as variáveis e pegando através do método os valores 
    $pessoa = $_GET['nome'];
    $email = $_GET['email'];

    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "android";

    $conn = mysqli_connect($hostname, $user, $password, $database);

    if (!$conn) {
        die("Conexão falhou". mysqli_connect_error());
    }
    echo "Conexão feita!!";
    //Quando a conexão já foi feita no BD, é hora de enviar para a tabela  
    $query = "insert into people(nome, email)
    values('$pessoa','$email')";
    //Se a conexão permanecer e a query conseguir enviar para a tabela ele segue
    $result = mysqli_query($conn, $query);
    if($result) {
        echo "Cadastro realizado";
    }else{
        echo "Cadastro não realizado";
        var_dump(mysqli_error($conn));
    }
    //Aqui é verficado se o q foi armazenado no tabela está sendo colocado de novo
    if($email == $result){
        echo "Já está cadastrado";
    }


?>