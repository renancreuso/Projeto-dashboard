<?php
    // importando arquivo de conexao
    require_once("../../adm/conexao.php");

    // prepara e exexutar o banco de dados

    $id = $_GET["id"];
    
    // cripotografica 
    $senha_hash = hash('sha256',$senha);

    $sql = "DELETE FROM pessoas WHERE id = :id";
    
    $comando = $pdo -> prepare($sql);
    $comando -> bindParam(":id",$id);
    $comando -> execute();

    if ($comando){
        echo"<script>
            alert('registro Excluido com Sucesso'); window.location.href='../index_dash.php';
            </script>";

    }else{  
        echo"<script>
            alert('Erro ao Excluir Registro!'); window.location.href='../index_dash.php';
            </script>";

    }

?>