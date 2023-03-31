<?php

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
        /*echo"<br>"."existe um usuario em nossa base de dados"."<br>";
        echo "usuario: ".$usuario."<br>";
        echo "senha: ".$senha."<br>";
        echo "senha cripotografada: ".$senha_hash."<br>";*/
        header("Location: dashboard/index_dash_apagar.php");


    }else{
        
        echo"<br>"."usuario não existe";
        header("Location: login.php");
      
     
    }


}else{
    echo"\nesso acesso indevido!";
}
    
