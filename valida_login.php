<?php
session_start();
if(isset($_POST['acao'])){
    require_once "adm/conexao.php";
    
    //obtento valores do input.
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $senha_hash =hash('sha256',$senha);

    // verificando se existe na base de dados.
    $sql = 'select * from pessoas where pessoas.cpf = :login and pessoas.senha = :senha_hash';
    $comando = $pdo -> prepare($sql);
    $comando-> bindParam(":login",$usuario);
    $comando-> bindParam(":senha_hash",$senha_hash);
    $comando -> execute();
    if ($comando -> rowCount()==1){
        $usuario = $comando -> fetch(PDO::FETCH_ASSOC);
        $_SESSION['nome'] =$usuario['nome'];
        //echo($_SESSION['nome']);
        header("Location: dashboard/index_dash.php");


    }else{
        
        echo"<br>"."usuario não existe";
        header("Location: login.php");
      
     
    }


}else{
    echo"\nesso acesso indevido!";
}
    
