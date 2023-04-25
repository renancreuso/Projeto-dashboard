<?php
    // importando arquivo de conexao
    require_once("../../adm/conexao.php");

    // Pegar Id do usuário
    $id = $_GET["id"];
    $situacao = $_GET["status"];
    $sql = "UPDATE pessoas SET `status` =:situacao WHERE id=:id";
    $comando = $pdo -> prepare($sql);
    $comando -> bindParam(":id",$id);

    if($situacao == 1){
        $comando->bindValue(":situacao","0");

    }else{
        $comando->bindValue(":situacao","1");
    }

    $comando -> execute();

    header("Location: ../index_dash.php");

