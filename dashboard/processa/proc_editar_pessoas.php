<?php
    // importando arquivo de conexao
    require_once("../../adm/conexao.php");

    // prepara e exexutar o banco de dados a edição do registro

    $id = $_POST["id"];
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $tipo_user = $_POST["tipo_user"];
    $data_nasc = $_POST["data_nasc"];
    // cripotografica 
    $senha_hash = hash('sha256',$senha);

    $sql = "UPDATE pessoas SET cpf = :cpf,nome = :nome ,senha = :senha,
    tipo_user = :tipo_user,data_nasc = :data_nasc,modified = NOW() WHERE id = :id";
    
    $comando = $pdo -> prepare($sql);
    $comando -> bindParam(":id",$id);
    $comando -> bindParam(":cpf",$cpf);
    $comando -> bindParam(":nome",$nome);
    $comando -> bindParam(":senha",$senha_hash);
    $comando -> bindParam(":tipo_user",$tipo_user);
    $comando -> bindParam(":data_nasc",$data_nasc);
    $comando -> execute();

    header("Location: ../index_dash.php");

?>